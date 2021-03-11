import { getCookie } from './utils.js';
import { _settings } from './settings.js';

export var _data = null;

export var _globals = { 
	lang: 'en', userName: null,
	htmlStyles: null, innerWidth: window.innerWidth, innerHeight: window.innerHeight,

	touchDevice: false, dateDMY: true, dateDelim: '.', timeDelim: ':', 
	ganttMTime: -1, 	ifSynchronizedIsBeingChecked: false, dataSynchronized: null, ifSynchronizedInterval: null,
	lockDataOn: null, lockDataDisabled: null, lockDataDiv: null, lockDataIcon: null, 
	containerDiv: null, containerDivX:0, containerDivY:0, containerDivWidth:0, containerDivHeight: 0,
	headerDiv: null, headerBox: null
};


export function initGlobals( appContainer, userName ) {
	if( 'ontouchstart' in document.documentElement ) { // To know if it is a touch device or not...
		_globals.touchDevice = true;
	}

	_globals.htmlStyles = window.getComputedStyle(document.querySelector("html"));
	
	if( appContainer ) {
		let bbox = appContainer.getBoundingClientRect();
    _globals.innerWidth = Math.floor(bbox.width); // - bbox.x;
		_globals.innerHeight = Math.floor(bbox.height); // - bbox.y;
	} else {
		_globals.innerWidth = window.innerWidth;
		_globals.innerHeight = window.innerHeight;
	}

	if( !userName ) {
		let cookieUserName = getCookie( 'userName' );
		if( cookieUserName !== null ) {
			userName = cookieUserName;
		}
	}
	if( !userName ) { userName = 'NoName'; }
	_globals.userName = userName;
}

export function initGlobalsWithLayoutParameters() {
	_globals.lockDataDiv = document.getElementById('toolboxLockDataDiv'); 
	_globals.lockDataIcon = document.getElementById('toolboxLockDataIcon'); 

	_globals.containerDiv = document.getElementById("containerDiv");
	
	let headerDiv = document.getElementById('header');
	let headerBox = headerDiv.getBoundingClientRect();
	let headerHeight = headerBox.height;	
	//let htmlStyles = window.getComputedStyle(document.querySelector("html"));
	//let headerHeight = parseInt( htmlStyles.getPropertyValue('--header-height') );
	_globals.containerDivHeight = window.innerHeight - headerHeight;

	_globals.containerDiv.style.height = _globals.containerDivHeight + "px";
	_globals.containerDiv.style.width = window.innerWidth + "px";

	_globals.containerDivX = _settings.containerHPadding;
	_globals.containerDivY = headerHeight;
	_globals.containerDivWidth = window.innerWidth - _settings.containerHPadding*2;
	_globals.containerDiv.style.padding=`0px ${_settings.containerHPadding}px 0px ${_settings.containerHPadding}px`;

	_globals.containerDiv.addEventListener('selectstart', function() { event.preventDefault(); return false; } );
	_globals.containerDiv.addEventListener('selectend', function() { event.preventDefault(); return false; } );
}

export function initGlobalsWithDataParameters() {
    if( 'parameters' in _data ) { 
        if( typeof(_data.parameters.dateDelim) === 'string' ) 
            _globals.dateDelim = _data.parameters.dateDelim;
        if( typeof(_data.parameters.timeDelim) === 'string' )
            _globals.timeDelim = _data.parameters.timeDelim;
        if( typeof(_data.parameters.language) === 'string' )
            _globals.lang = _data.parameters.language;
        if( typeof(_data.parameters.secondsInPixel) === 'string' ) 
            _globals.secondsInPixel = _data.parameters.secondsInPixel;
        if( typeof(_data.parameters.expandToLevelAtStart) === 'string' ) 
            _globals.expandToLevelAtStart = _data.parameters.expandToLevelAtStart;

        let patternMDY = new RegExp( '([mM]+)([dD]+)([yY]+)' ); // Determining date format: DMY or MDY
        if( patternMDY.test(_data.parameters.dateFormat) ) {               
            _globals.dateDMY = false;
        } else {
            _globals.dateDMY = true;
        }
    } 
}


export function setGlobal( key, value ) {
	_globals[key] = value;
}

export function setData( data ) {
	_data = data;
}

