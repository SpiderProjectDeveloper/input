import './index.css';
import mainHTML from './main.html';
import { _texts, _icons } from './texts.js';
import { _settings } from './settings.js';
import { _globals, _data, initGlobals, initGlobalsWithLayoutParameters, initGlobalsWithDataParameters, setData } from './globals.js';
import { displayMessageBox, hideMessageBox, createEditBoxInputs } from './boxes.js';
import { csvIntoJSON, decColorToString, deleteCookie, dateIntoSpiderDateString, digitsOnly, 
	ifSynchronizedCheck, displaySynchronizedStatus } from './utils.js';
import { lockData, lockDataSuccessFunction, lockDataErrorFunction } from './lockdata.js';
import { drawTableHeader, drawTableContent } from './drawtable.js';

// Attaching to the html container element
let script = document.getElementById('bundle');
let appContainer = null;
let userName = null;
if( script ) {	
	let appContainerName = script.getAttribute('data-appcontainer');
	if(appContainerName) { 
		appContainer = document.getElementById(appContainerName);
    }
    userName = script.getAttribute('data-username');
}
if( appContainer ) {
	appContainer.innerHTML = mainHTML;
} else { 
	document.body.innerHTML = mainHTML;
}
initGlobals(appContainer, userName);
	
window.addEventListener( "load", onWindowLoad );

function onWindowLoad() {
	//document.getElementById('toolboxNewProjectDiv').onclick = function(e) { newProject(); };
	initGlobalsWithLayoutParameters();
	loadData();
}

function loadData() {
	if( document.location.host ) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		    if (this.readyState == 4 ) {
		    	if( this.status == 200) {
			    	let errorParsingData = false;
			    	try{
				        setData( JSON.parse(this.responseText) );
			    	} catch(e) {
			    		//alert('Error: ' + e.name + ":" + e.message + "\n" + e.stack + "\n" + e.cause);
			    		errorParsingData = true;
			    	}
			    	if( errorParsingData ) { // To ensure data are parsed ok... // alert(this.responseText);
						displayMessageBox( _texts[_globals.lang].errorParsingData ); 
						return;
			    	}
			    	if( !('activities' in _data) || _data.activities.length == 0 ) {
							displayMessageBox( _texts[_globals.lang].errorParsingData ); 
						return;
			    	}

						initGlobalsWithDataParameters();

						var xmlhttpUserData = new XMLHttpRequest();
						xmlhttpUserData.onreadystatechange = function() {
							if (this.readyState == 4 ) {
								let userData = [];
								if( this.status == 200) {		    
									userData = csvIntoJSON(this.responseText);
								} else if( status == 404 ) {
									//_dataSynchronized = 1;
								}
								hideMessageBox();		    
								if( initData() == 0 ) {
									if( _data.editables.length == 0 ) {
										_data.noEditables = true;
									} else { 	
										if( userData.length == 0 ) { 				
											_globals.dataSynchronized = -1;
										} else {
											setUserData( userData );
										}
										_data.noEditables = false;
										createEditBoxInputs();
										ifSynchronizedCheck();
									}
									displayData();
								}
							}
						}; 
						xmlhttpUserData.open("GET", _settings.urlUserData, true);
						xmlhttpUserData.setRequestHeader("Cache-Control", "no-cache");
						xmlhttpUserData.send();
					} else {
						displayMessageBox( _texts[_globals.lang].errorLoadingData ); 
					}
		    }
		};
		xmlhttp.open("GET", _settings.urlData, true);
		xmlhttp.setRequestHeader("Cache-Control", "no-cache");
		xmlhttp.send();
		displayMessageBox( _texts[_globals.lang].waitDataText ); 
	} 
}

function displayData() {	
	displayHeaderAndFooterInfo();	
	drawTableHeader(true);
	drawTableContent(true);
}

function initData() {
	initGlobalsWithDataParameters();

	_data.project.curTimeInSeconds = _data.project.CurTime;
	_data.project.CurTime = dateIntoSpiderDateString( _data.project.CurTime );

	if( _data.activities.length == 0 ) {
		displayMessageBox( _texts[_globals.lang].errorParsingData );						
		return(-1);				
	}
	if( !('Code' in _data.activities[0]) || !('Level' in _data.activities[0]) ) { 	// 'Code' and 'Level' is a must!!!!
		displayMessageBox( _texts[_globals.lang].errorParsingData );						// Exiting otherwise...
		return(-1);		
  }

	// Creating "editables" array for better data handling and attaching it to "_data"
	_data.editables = [];     
	for( let col = 0 ; col < _data.fields.length ; col++ ) {
		if( 'editable' in _data.fields[col] && _data.fields[col].editable == true ) {
			_data.editables.push({ 
					ref: _data.fields[col].Code, name:_data.fields[col].Name, 
					type: _data.fields[col].Type, format: _data.fields[col].format 
			});
		}
	}

	// Creating ref-type array and attaching it to "_data"
	_data.refSettings = {};
	for( let col = 0 ; col < _data.fields.length ; col++ ) {
		let o = { column: col, type: _data.fields[col].Type, format: _data.fields[col].format, 
			name: _data.fields[col].Name, editableType: null };
		for( let ie = 0 ; ie < _data.editables.length ; ie++ ) { 	// Is editable?
			if( _data.editables[ie].ref === _data.fields[col].Code ) {
				o.editableType = _data.editables[ie].type;
			}
		}
		_data.refSettings[ _data.fields[col].Code ] = o;
	}

	for( let i = 0 ; i < _data.activities.length ; i++ ) {
		let d = _data.activities[i];
		d.color = decColorToString( d.f_ColorCom, _settings.ganttOperation0Color );
		d.colorBack = decColorToString( d.f_ColorBack, "#ffffff" );
		d.colorFont = decColorToString( d.f_FontColor, _settings.tableContentStrokeColor );
		if( typeof( d.Level ) === 'string' ) {
			if( digitsOnly(d.Level) ) {
				d.Level = parseInt(d.Level);
			}
		}
		for( let col = 0 ; col < _data.fields.length ; col++ ) {
			if( !(_data.fields[col].Code in d) ) {
				d[_data.fields[col].Code] = null;
			}
		}
	}

	// Initializing the parent-children structure and the link structure
	for( let i = 0 ; i < _data.activities.length ; i++ ) {
		_data.activities[i].id = 'ganttRect' + i; // Id
		initParents(i);
		_data.activities[i]._isPhase = (typeof(_data.activities[i].Level) === 'number') ? true : false;
	}

	// Marking 'expandables'
	for( let i = 0 ; i < _data.activities.length ; i++ ) {
		let hasChild = false;
		for( let j = i+1 ; j < _data.activities.length ; j++ ) {
			for( let k = 0 ; k < _data.activities[j].parents.length ; k++ ) {
				if( _data.activities[j].parents[k] == i ) { // If i is a parent of j
					hasChild = true;
					break;
				}
			}
			if( hasChild ) {
				break;
			}
		}
		if( hasChild ) {
			_data.activities[i].expanded = true;
			_data.activities[i].expandable = true;
		} else {
			_data.activities[i].expanded = true;			
			_data.activities[i].expandable = false;
		}
		_data.activities[i].visible = true;
	}
	return(0);
}


function initParents( iOperation ) {
	_data.activities[iOperation].parents = []; // Initializing "parents"
	for( let i = iOperation-1 ; i >= 0 ; i-- ) {
		let l = _data.activities[iOperation].parents.length;
		let currentLevel;
		if( l == 0 ) {
			currentLevel = _data.activities[iOperation].Level;
		} else {
			let lastPushedIndex = _data.activities[iOperation].parents[l-1];
			currentLevel = _data.activities[lastPushedIndex].Level;
		}
		if( currentLevel === null ) { // Current level is an operation
			if( typeof(_data.activities[i].Level) === 'number' ) {
				_data.activities[iOperation].parents.push(i);
			}
		} else if( typeof(currentLevel) === 'number' ) { // Current level is a phase
			if( typeof(_data.activities[i].Level) === 'number' ) {
				if( _data.activities[i].Level < currentLevel ) {
					_data.activities[iOperation].parents.push(i);
				}
			}
		} else if( typeof(currentLevel) === 'string' ) { // Current level is a team or resourse
			if( _data.activities[i].Level === null ) { // The upper level element is an operation
				_data.activities[iOperation].parents.push(i);
			} else if( currentLevel == 'A' ) {
				if( _data.activities[i].Level === 'T' ) { // The upper level element is a team
					_data.activities[iOperation].parents.push(i);
				}
			}
		}
	}	
}


function displayHeaderAndFooterInfo() {
	let projectName = document.getElementById('projectName');
	projectName.innerText = _data.project.Name;
	document.title = "SP | " + _data.project.Name;

	let timeAndVersion = _data.project.CurTime + " | " + _texts[_globals.lang].version + ": " + _data.project.Version;
	document.getElementById('projectTimeAndVersion').innerText = timeAndVersion;
	if( _globals.userName !== null ) {
		let el = document.getElementById('projectUser');
		//el.innerHTML = _userName + "<br/><a href='" + _files.logout + "' title='Logout'>[&rarr;]</a>"; // ➜ ➡ ➝ ➲ ➠ ➞ ➩ ➯ →
		el.innerHTML = _globals.userName + "<br/><span style='cursor:pointer;'>[&rarr;]</span>"; // ➜ ➡ ➝ ➲ ➠ ➞ ➩ ➯ →
		el.onclick = function(e) { logout(); };
	}

	//document.getElementById('helpTitle').innerText = _texts[_globals.lang].helpTitle; // Initializing help text	
	//document.getElementById('helpText').innerHTML = _texts[_globals.lang].helpText; // Initializing help text	

	//document.getElementById('toolboxNewProjectDiv').title = _texts[_globals.lang].titleNewProject;	
	//document.getElementById('toolboxNewProjectIcon').setAttribute('src',_icons.newProject);

	lockData( null, lockDataSuccessFunction, lockDataErrorFunction ); 		// Initializing lock data tool
	displaySynchronizedStatus(); 		// Initializing syncho-data tool
}


function setUserData( userData ) { // Sets user data read from a file
	let ok = true;
	try {
		for( let i = 0 ; i < _data.activities.length ; i++ ) { // For all array...
			for( let iU = 0 ; iU < userData.length ; iU++ ) { // For all userData items...
				let lineNumber = userData[iU][_settings.webExportLineNumberColumnName];	// The line number inside the exported csv-

				// If the codes are the same and the numbers of lines are the same ...
				if( !(_data.activities[i].Code == userData[iU].Code && i == lineNumber) ) {
					continue;
				}
				_data.activities[i].userData = {};
				for( let iE=0 ; iE < _data.editables.length ; iE++ ) {
					let ref = _data.editables[iE].ref;
					if( ref in userData[iU] ) {
						_data.activities[i].userData[ ref ] = userData[iU][ ref ];
					} else {
						_data.activities[i].userData[ ref ] = _data.activities[i][ ref ];						
					}
				}
				// Files uploading... 
				let fnames = [];
				let unames = [];
				if( _settings.webExportFileNamesColumn in userData[iU] && _settings.webExportUserFileNamesColumn in userData[iU] ) {
					fnames = userData[iU][_settings.webExportFileNamesColumn].split('|');
					unames = userData[iU][_settings.webExportUserFileNamesColumn].split('|');
				}
				for( let iF = 0 ; iF < _settings.webExportFilesNumber ; iF++ ) {
					let refF = _settings.webExportFileNameKey + iF;							
					let refU = _settings.webExportUserFileNameKey + iF;
					if( iF < fnames.length ) {
						_data.activities[i].userData[ refF ] = fnames[iF];						
					} else {
						_data.activities[i].userData[ refF ] = '';						
					}
					if( iF < unames.length ) {
						_data.activities[i].userData[ refU ] = unames[iF];						
					} else {
						_data.activities[i].userData[ refU ] = '';						
					}
				}
				break;
			}
		}
	} catch(e) {
		ok = false;
	}
	return ok;
}


function logout() {
	if( document.location.host ) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 ) {
				if( this.status == 401 ) {
					window.location.replace('http://www.spiderproject.com/');
				}
			}
		};
		xmlhttp.open("GET", _settings.urlLogout, true);
		xmlhttp.setRequestHeader("Cache-Control", "no-cache");
		xmlhttp.send();
	} 
}

/*
function newProject() {
	let cookies = document.cookie.split(";");
    for (let i = 0; i < cookies.length; i++) {
    	let namevalue = cookies[i].split('=');
    	if( namevalue ) {
	    	if( namevalue.length == 2 ) {
	    		let cname = trimString(namevalue[0]);
					if( cname.length > 0 ) {
						deleteCookie( cname );	    			
					}
				}
			}
		}
	location.reload();
}
*/