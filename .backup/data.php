<?php require('auth.php'); if( isAuthRequired() ) { auth(true); } ?>
{
  "parameters" : {
    "language" : "ru",
    "timeDelim" : ":",
    "dateDelim" : ".",
    "dateFormat" : "",
    "uploadTime" : 1616418793 
  },
  "project" : {
    "Code" : "01km_exp",
    "Version" : 1,
    "Name" : "1 км дороги",
    "Notes" : "",
    "CurTime" : 1521187200,
    "WexbimPath" : "",
    "secondsInPixel" : "6945",
    "expandToLevelAtStart" : "3" 
  },
  "Start" : "16.03.18  08:00",
  "Fin" : "23.03.18  08:00",
  "activities" : [
    {
      "Level" : "1",
      "Code" : "01km",
      "Name" : "1 км дороги",
      "Person" : "user",
      "Calen" : "1",
      "f_ColorBack" : "13233656" 
    },
    {
      "Level" : "2",
      "Code" : "8",
      "Name" : "Управление",
      "Calen" : "1",
      "f_ColorBack" : "13434828" 
    },
    {
      "Code" : "1",
      "Name" : "Управление",
      "VolPlan" : 100,
      "VolDone" : 12,
      "VolRest" : 88,
      "TeamDur" : 448.589166666667,
      "DurDone" : 66,
      "DurRest" : 382.589166666667,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    },
    {
      "Code" : "21",
      "Name" : "Начало",
      "VolPlan" : 100,
      "VolDone" : 90,
      "VolRest" : 10,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    },
    {
      "Level" : "2",
      "Code" : "в0ув",
      "Name" : "Устройство водоотвода",
      "Calen" : "1",
      "f_ColorBack" : "13434828" 
    },
    {
      "Code" : "в1",
      "Name" : "Планировка участка",
      "VolPlan" : 5000,
      "VolDone" : 5005,
      "TeamDur" : 55.5555555555556,
      "DurDone" : 55.5555555555556,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    },
    {
      "Code" : "в3",
      "Name" : "Устройство водосборника",
      "VolPlan" : 2000,
      "VolDone" : 879.109645928368,
      "VolRest" : 1120.89035407163,
      "TeamDur" : 86.9566666666667,
      "DurDone" : 38.2222222222222,
      "DurRest" : 48.7344444444445,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    },
    {
      "Code" : "в2",
      "Name" : "Устройство Водоотводных канав",
      "VolPlan" : 4000,
      "VolDone" : 292.444281975399,
      "VolRest" : 3707.5557180246,
      "TeamDur" : 142.857222222222,
      "DurDone" : 10.4444444444444,
      "DurRest" : 132.412777777778,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    },
    {
      "Level" : "2",
      "Code" : "3",
      "Name" : "Устройство Основания",
      "Calen" : "1",
      "f_ColorBack" : "13434828" 
    },
    {
      "Code" : "10",
      "Name" : "Планировка",
      "VolPlan" : 12000,
      "VolDone" : 940,
      "VolRest" : 11060,
      "TeamDur" : 133.333333333333,
      "DurDone" : 10.4444444444444,
      "DurRest" : 122.888888888889,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    },
    {
      "Code" : "7",
      "Name" : "Заготовка песка, щебня",
      "VolPlan" : 20000,
      "VolDone" : 1582.49158249158,
      "VolRest" : 18417.5084175084,
      "TeamDur" : 132,
      "DurDone" : 10.4444444444444,
      "DurRest" : 121.555555555556,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    } 
  ],
  "fields" : [
    {
      "Code" : "Level",
      "Name" : "Уровень",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 2 
    },
    {
      "Code" : "Code",
      "Name" : "Код",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "Name",
      "Name" : "Название",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 40 
    },
    {
      "Code" : "Start",
      "Name" : "Начало периода",
      "Type" : "datetime",
      "editable" : 1,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "Fin",
      "Name" : "Окончание периода",
      "Type" : "datetime",
      "editable" : 1,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "Person",
      "Name" : "Ответственный",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "Folder",
      "Name" : "Ссылки на документы, сайты, папки (URL)",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "Notes",
      "Name" : "Комментарии",
      "Type" : "text",
      "editable" : 1,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "VolPlan",
      "Name" : "Объём [Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "VolDone",
      "Name" : "Объём [Выполнено]",
      "Type" : "number",
      "editable" : 1,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "VolRest",
      "Name" : "Объём [Остаток]",
      "Type" : "number",
      "editable" : 1,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "TeamDur",
      "Name" : "Длительность, Часы [Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "DurDone",
      "Name" : "Длительность, Часы [Пройдено]",
      "Type" : "number",
      "editable" : 1,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "DurRest",
      "Name" : "Длительность, Часы [Остаток]",
      "Type" : "number",
      "editable" : 1,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "NumFact",
      "Name" : "Количество [Факт]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "WorkLoadDone",
      "Name" : "Трудоёмкость [Выполнено]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "LoadFact",
      "Name" : "Загрузка [Факт]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "Calen",
      "Name" : "Календарь",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 1,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "f_FontColor",
      "Name" : "Цвет текста",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 1,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "f_ColorBack",
      "Name" : "ColorBack",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 1,
      "format" : 0,
      "widthsym" : 17 
    } 
  ],
  "calendars" : [
    {
      "Code" : "1",
      "array" : [
        1521187200,
        1521226800,
        1521273600,
        1521313200,
        1521446400,
        1521486000,
        1521532800,
        1521572400,
        1521619200,
        1521658800,
        1521705600,
        1521745200,
        1521792000,
        1521831600 
      ] 
    } 
  ] 
}
