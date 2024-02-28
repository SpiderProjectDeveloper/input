<?php require('auth.php'); if( isAuthRequired() ) { auth(true); } ?>
{
  "parameters" : {
    "language" : "ru",
    "timeDelim" : ":",
    "dateDelim" : ".",
    "dateFormat" : "",
    "uploadTime" : 1623414359 
  },
  "project" : {
    "Code" : "01km_exp",
    "Version" : 5,
    "Name" : "1 км дороги",
    "Notes" : "",
    "CurTime" : 1523642400,
    "WexbimPath" : "",
    "secondsInPixel" : "6945",
    "expandToLevelAtStart" : "3" 
  },
  "Start" : "13.04.18  18:00",
  "Fin" : "20.04.18  18:00",
  "activities" : [
    {
      "Level" : "1",
      "Code" : "01km",
      "Name" : "1 км дороги",
      "Start" : 1523642400,
      "Fin" : 1524247200,
      "Person" : "Admin",
      "c_pln_мт" : 14540437.9204149,
      "m_pln_1" : 31905.8661111111,
      "m_pln_2" : 6000,
      "m_pln_3" : 13900,
      "Calen" : "1",
      "f_ColorBack" : "13233656" 
    },
    {
      "Level" : "2",
      "Code" : "8",
      "Name" : "Управление",
      "Start" : 1523642400,
      "Fin" : 1524247200,
      "Calen" : "1",
      "f_ColorBack" : "13434828" 
    },
    {
      "Code" : "1",
      "Name" : "Управление",
      "Start" : 1523642400,
      "Fin" : 1524247200,
      "DPH" : "Гамак",
      "VolPlan" : 37.7920043786758,
      "VolDone" : 13.2532674073659,
      "VolRest" : 24.5387369713099,
      "TeamDur" : 188.200555555556,
      "DurDone" : 66,
      "DurRest" : 122.200555555556,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    },
    {
      "Level" : "2",
      "Code" : "3",
      "Name" : "Устройство Основания",
      "Start" : 1523642400,
      "Fin" : 1524247200,
      "c_pln_мт" : 5130512.25374822,
      "m_pln_1" : 24104.6994444444,
      "m_pln_3" : 13000,
      "Calen" : "1",
      "f_ColorBack" : "13434828" 
    },
    {
      "Code" : "8",
      "Name" : "Устройство песчаной постели",
      "Start" : 1523642400,
      "Fin" : 1523731801,
      "Unit" : "м3",
      "DPH" : "Производительность",
      "VolPlan" : 1420.02859990467,
      "VolDone" : 1420.02859990467,
      "TeamDur" : 11.8336111111111,
      "DurDone" : 11.8336111111111,
      "c_pln_мт" : 470928.920414891,
      "c_asp_мт" : 470928.920414891,
      "m_pln_1" : 1396.36611111111,
      "m_asp_1" : 1396.36611111111,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    },
    {
      "Code" : "9",
      "Name" : "Устройство каменной постели",
      "Start" : 1523731801,
      "Fin" : 1524247200,
      "Unit" : "м3",
      "DPH" : "Производительность",
      "VolPlan" : 10000,
      "VolDone" : 6499.96666666667,
      "VolRest" : 3500.03333333333,
      "TeamDur" : 83.3333333333333,
      "DurDone" : 54.1663888888889,
      "DurRest" : 29.1669444444444,
      "c_pln_мт" : 4376333.33333333,
      "c_asp_мт" : 2844602.07888889,
      "m_pln_1" : 9833.33333333333,
      "m_asp_1" : 6391.63388888889,
      "m_pln_3" : 13000,
      "m_asp_3" : 8449.95666666667,
      "Calen" : "1",
      "f_ColorBack" : "16777215" 
    },
    {
      "Code" : "18",
      "Name" : "Нарезка кюветов",
      "Start" : 1523642400,
      "Fin" : 1524247200,
      "Unit" : "м",
      "DPH" : "Производительность",
      "VolPlan" : 2000,
      "VolDone" : 1056,
      "VolRest" : 944,
      "TeamDur" : 125,
      "DurDone" : 66,
      "DurRest" : 59,
      "c_pln_мт" : 283250,
      "c_asp_мт" : 149556,
      "m_pln_1" : 12875,
      "m_asp_1" : 6798,
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
      "Code" : "Notes",
      "Name" : "Комментарии",
      "Type" : "text",
      "editable" : 1,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "Unit",
      "Name" : "Единица объёма",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "Prod",
      "Name" : "Производительность",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "ProdFact",
      "Name" : "Производительность [Факт]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "Prior",
      "Name" : "Приоритет",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "DPH",
      "Name" : "Тип ДПГ",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "f_ExpectedFin",
      "Name" : "Ожидаемое окончание",
      "Type" : "datetime",
      "editable" : 0,
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
      "Code" : "c_pln_мт",
      "Name" : "Ст. материалов [Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "c_asp_мт",
      "Name" : "Ст. материалов [Расход]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "c_fix_мт",
      "Name" : "Ст. материалов [Фикс Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "c_fsp_мт",
      "Name" : "Ст. материалов [Фикс Расход]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "c_res_мт",
      "Name" : "Ст. материалов [Фикс Остаток]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_pln_1",
      "Name" : "ГСМ [Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_asp_1",
      "Name" : "ГСМ [Расход]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_fix_1",
      "Name" : "ГСМ [Фикс Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_fsp_1",
      "Name" : "ГСМ [Фикс Расход]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_res_1",
      "Name" : "ГСМ [Фикс Остаток]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_pln_2",
      "Name" : "Битум [Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_asp_2",
      "Name" : "Битум [Расход]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_fix_2",
      "Name" : "Битум [Фикс Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_fsp_2",
      "Name" : "Битум [Фикс Расход]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_res_2",
      "Name" : "Битум [Фикс Остаток]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_pln_3",
      "Name" : "Щебень [Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_asp_3",
      "Name" : "Щебень [Расход]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "m_fix_3",
      "Name" : "Щебень [Фикс Было]",
      "Type" : "number",
      "editable" : 0,
      "hidden" : 0,
      "format" : 0,
      "widthsym" : 17 
    },
    {
      "Code" : "AssIndex",
      "Name" : "Индекс",
      "Type" : "text",
      "editable" : 0,
      "hidden" : 1,
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
      "Name" : "Цвет фона",
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
        1523642400,
        1523646000,
        1523692800,
        1523732400,
        1523865600,
        1523905200,
        1523952000,
        1523991600,
        1524038400,
        1524078000,
        1524124800,
        1524164400,
        1524211200,
        1524250800 
      ] 
    } 
  ] 
}
