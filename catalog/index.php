<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>
<?
if (isset($_REQUEST['sort'])) {
    switch (strip_tags($_REQUEST['sort'])) {
        case 'price':
            $_SESSION['CATALOG_SORT_FIELD'] = 'catalog_PRICE_1';
            break;
        case 'popular':
            $_SESSION['CATALOG_SORT_FIELD'] = 'SHOWS';
            break;
    }
} elseif (!isset($_SESSION['CATALOG_SORT_FIELD'])) {
    $_SESSION['CATALOG_SORT_FIELD'] = 'catalog_PRICE_1';
}

if (isset($_REQUEST['by'])) {
    if (strip_tags($_REQUEST['by']) == 'desc') $_SESSION['CATALOG_SORT_ORDER'] = 'desc';
    else $_SESSION['CATALOG_SORT_ORDER'] = 'asc';
} elseif (!isset($_SESSION['CATALOG_SORT_ORDER'])) $_SESSION['CATALOG_SORT_ORDER'] = 'asc';

if (isset($_REQUEST['per_page'])) {
    switch (strip_tags($_REQUEST['per_page'])) {
        case 24:
            $_SESSION['CATALOG_PER_PAGE'] = 24;
            break;
        case 48:
            $_SESSION['CATALOG_PER_PAGE'] = 48;
            break;
        case 'all':
            $_SESSION['CATALOG_PER_PAGE'] = 'all';
            break;
        default:
            $_SESSION['CATALOG_PER_PAGE'] = 16;
            break;
    }
} elseif (!isset($_SESSION['CATALOG_PER_PAGE'])) {
    $_SESSION['CATALOG_PER_PAGE'] = 16;
}
if (isset($_REQUEST['catalog_type'])) {
    switch (strip_tags($_REQUEST['catalog_type'])) {
        case 'list':
            $_SESSION['CATALOG_TYPE_VIEW'] = 'LIST';
            break;
        case 'tile':
            $_SESSION['CATALOG_TYPE_VIEW'] = 'TILE';
            break;
        default:
            $_SESSION['CATALOG_TYPE_VIEW'] = 'TILE';
            break;
    }
} elseif (!isset($_SESSION['CATALOG_TYPE_VIEW'])) {
    $_SESSION['CATALOG_TYPE_VIEW'] = 'TILE';
}
?>
<? $APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"catalog", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BASKET_URL" => "/cart/",
		"BIG_DATA_RCM_TYPE" => "similar",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"COMPATIBLE_MODE" => "Y",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "BUY",
			1 => "ADD",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
			0 => "BUY",
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
			1 => "MAGNIFIER",
		),
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "H",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(
		),
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "VES_KG",
			1 => "DLYA_TRUBY_UPONOR_PEX",
			2 => "NALICHIE_PLOSHCHADKI",
			3 => "NALICHIE_TENA",
			4 => "NEOTOZHZHENNAYA",
			5 => "OTOZHZHENNAYA",
			6 => "PODKLYUCHENIE_SO_STORONY_POTREBITELYA_",
			7 => "SHIRINA_SM",
			8 => "VOZMOZHNOST_PODKLYUCHENIYA_TENA",
			9 => "GLUBINA_SM_",
			10 => "DIAMETR_OTVERSTIYA_DLYA_MONTAZHA_MM",
			11 => "DLYA_TRUBY_UPONOR_UNI_PIPE_PLUS",
			12 => "KOLICHESTVO_KONTUROV",
			13 => "MOSHCHNOST_VT",
			14 => "NATSENKA",
			15 => "DLINA_KABELYA_M",
			16 => "DLYA_TRUBY_UPONOR_MLC",
			17 => "KOLICHESTVO_TEPLOOBMENNIKOV_DLYA_BOYLEROV",
			18 => "KOLICHESTVO_CHASH_MOYKI",
			19 => "MAKSIMALNAYA_PROIZVODITELNOST_VENTILYATSII_M3_CH",
			20 => "MOSHCHNOST_KVT",
			21 => "PORYADOK_OKRUGLENIYA",
			22 => "GLUBINA_MM",
			23 => "DLYA_TRUBY_Q_E",
			24 => "MOSHCHNOST_KOTLA_MAKSIMALNAYA_KVT_DLYA_MKS",
			25 => "NALICHIE_KRYLA_MOYKI",
			26 => "SERIYA",
			27 => "TIP_IZOLYATSII",
			28 => "CML2_ARTICLE",
			29 => "CML2_BASE_UNIT",
			30 => "DIAMETR_SVARIVAEMYKH_TRUB_MM",
			31 => "DLYA_PRESS_FITINGI_UPONOR_MLC",
			32 => "MAKSIMALNOE_DAVLENIE_BAR",
			33 => "NAZNACHENIE_D_SMESITELEY_I_SIFONOV_MANOMETR",
			34 => "NAPOR_M",
			35 => "CML2_MANUFACTURER",
			36 => "CML2_TRAITS",
			37 => "CML2_TAXES",
			38 => "TOLSHCHINA_MM",
			39 => "CML2_ATTRIBUTES",
			40 => "CML2_BAR_CODE",
			41 => "MATERIAL_NAGREVAYUSHCHEGO_ELEMENTA",
			42 => "OBEM",
			43 => "RAZMESHCHENIE_USTANOVKA_NA_POL_NA_STENU_",
			44 => "TIP_SMESITELYA_ODNA_RUCHKA_DVUKHVENTELNYY_",
			45 => "TOLSHCHINA_TRUBY_MM",
			46 => "SHIRINA_M",
			47 => "VYSOTA_IZLIVA_MM_SMESITELI",
			48 => "DLINA_M",
			49 => "KAMERA_SGORANIYA",
			50 => "MATERIAL",
			51 => "TIP_TERMOREGULYATORA",
			52 => "KHOLODNOE_VODOSNABZHENIE",
			53 => "VYSOTA_MM",
			54 => "GORYACHEE_VODOSNABZHENIE",
			55 => "MONTAZHNAYA_SHIRINA_SM",
			56 => "OTOPLENIE_DA_NET",
			57 => "TIP_RADIATORA_",
			58 => "TOLSHCHINA_FOLGI_MKM",
			59 => "GVS_DA_NET",
			60 => "DLINA_IZLIVA_MM_DLYA_SMESITELYA_",
			61 => "KOLICHESTVO_SEKTSIY",
			62 => "MONTAZHNAYA_VYSOTA_SM",
			63 => "OKHLAZHDENIE",
			64 => "POKRYTIE_D_IZOLYATSII",
			65 => "ED_IZMERENIYA",
			66 => "KONDENSATSIONNYY",
			67 => "MEZHOSEVOE_RASSTOYANIE",
			68 => "OBEM_SMYVNOGO_BACHKA_L",
			69 => "RAZMESHCHENIE_DLYA_SMESITELEY",
			70 => "SHAG_UKLADKI_SM_D_IZOLYATSII",
			71 => "BREND",
			72 => "VNUTRENNIY_DIAMETR_IZOLYATSII_MM",
			73 => "MATERIAL_TEPLOIZOLYATSII",
			74 => "OTAPLIVAEMAYA_PLOSHCHAD_M2_",
			75 => "PANEL_SMYVA_V_KOMPLEKTE",
			76 => "TIP_PODKLYUCHENIYA_RADIATORA_BOK_NIZH",
			77 => "MATERIAL_ZASHCHITNOGO_KOZHUKHA",
			78 => "NOMINALNYY_TOK_A",
			79 => "TEPLOOTDACHA_PRI_T_70_C",
			80 => "TIP_POLOTENTSESUSHITELYA",
			81 => "TOLSHCHINA_IZOLYATSII_MM_",
			82 => "UPRAVLENIE_SMYVNYM_KLAPANOM",
			83 => "DIAMETR_TRUBY_MM",
			84 => "NAPRYAZHENIE_SETI_V",
			85 => "PODKLYUCHENIE_D_POLOTENTSESUSHITELEY_",
			86 => "PROPUSKNAYA_SPOSOBNOST_M3_CH",
			87 => "STRANA",
			88 => "TIP_PODVODKI_D_ARMATURY_UNITAZNOY",
			89 => "GARANTIYA_LET",
			90 => "DIAMETR_REZBY_",
			91 => "DIAMETR_TRUBY_S_TEPLOIZOLYATSIEY_MM",
			92 => "KOLICHESTVO_SLOEV",
			93 => "NALICHIE_POLKI",
			94 => "STUPENI_MOSHCHNOSTI_KVT_DLYA_ELEKTRO_KOTOLOV",
			95 => "DVOYNOY_ELEMENT_VT",
			96 => "DIAMETR_PODKLYUCHENIE_KONTURA_OTOPLENIYA",
			97 => "DIAPOZON_IZMERENIYA_C",
			98 => "DIAPOZON_IZMERENIYA_BAR",
			99 => "KANALIZATSIYA",
			100 => "RABOCHEE_DAVLENIE_BAR",
			101 => "SPOSOB_NAGREVA_D_POLOTENTSESUSHITELEY_",
			102 => "DIAMETR_DYMOKHODA_MM_DLYA_KOTLOV",
			103 => "DRENAZH_I_FEKALNYE_VODY",
			104 => "MATERIAL_REZBY_D_ARMATURY_UNITAZNOY",
			105 => "NAZNACHENIE_",
			106 => "NAZNACHENIE_KANALIZATSIONNOY_SISTEMY",
			107 => "TIP_SCHETCHIKA",
			108 => "TSVET_",
			109 => "DLINA_REZBY_MM_D_ARMATURY_UNITAZNOY",
			110 => "KOLICHESTVO_KONTROLIRUEMYKH_UROVNEY",
			111 => "MOSHCHNOST_POTREBLYAEMAYA_VT",
			112 => "NAIMENOVANIE",
			113 => "NALICHIE_BOYLERA_DA_NET",
			114 => "TEPLOOTDACHA_VT_M2",
			115 => "TIP_KOLODTSA",
			116 => "DVOYNAYA_KNOPKA_D_ARMATURY_UNITAZNOY",
			117 => "ISPOLNENIE_LOTKOVOY_CHASTI",
			118 => "OBEM_BOYLERA",
			119 => "RAZMER_FILTRUEMYKH_CHASTITS_MKM",
			120 => "TIP_IZDELIYA",
			121 => "TIP_MATA",
			122 => "VYSOTA_KOLODTSA_SM",
			123 => "DIAMETR_OSNOVNOY",
			124 => "MOSHCHNOST_PRI_230V_VT",
			125 => "NALICHIE_STOP_KNOPKI_D_ARMATURY_UNITAZNOY",
			126 => "PROZRACHNYY_KORPUS",
			127 => "TIP_RADIATORA_PO_GLUBINE",
			128 => "VYSOTA_RADIATORA_MM_",
			129 => "VYSOTA_TELESKOPICHESKOY_TRUBY_M",
			130 => "DIAMETR_DOPOLNITELNYY",
			131 => "PLOSHCHAD_UKLADKI_M2",
			132 => "PODKHODIT_DLYA_GORYACHEY_VODY",
			133 => "REGULIRUEMAYA_DLINA_MM_D_GOFRY_SANTEKHNICHESKOY",
			134 => "DIAMETR_OSNOVNOY_TRUBY_MM",
			135 => "DLINA_RADIATORA_MM",
			136 => "NACHILIE_GAYKI_D_GOFRY_SANTEKHNICHESKOY",
			137 => "TIP_KARTRIDZHA",
			138 => "TIP_PRISOEDINENIYA",
			139 => "FOLGIROVANNYY_D_ELEKTRICHESKIKH_TEPLYKH_POLOV_",
			140 => "DIAMETR_TELESKOPICHESKOY_TRUBY_MM",
			141 => "MATERIAL_GAYKI",
			142 => "MONTAZHNAYA_VYSOTA_MM",
			143 => "TIP_REZBY_",
			144 => "TIP_RUCHKI_DLYA_KRANOV_RUCHKA_BABOCHKA",
			145 => "TIPORAZMER_KARTRIDZHA",
			146 => "DIAMETR_PATRUBKOV_MM",
			147 => "KRAN_SO_SGONOM_",
			148 => "MAKSIMALNAYA_MOSHCHNOST_VA",
			149 => "MONTAZHNAYA_GLUBINA_MM",
			150 => "RADIOBAZA",
			151 => "SKOROST_STOKA_VODY_L_MIN",
			152 => "ISPOLNENIE_KRANA_",
			153 => "KOMPLEKT_POSTAVKI",
			154 => "OBYEM_ILOSBORNIKA_L",
			155 => "PODKHODIT_DLYA_ZHELOBA_",
			156 => "TIP_STABILIZATORA",
			157 => "TIP_SHKAFA",
			158 => "VKHODNOE_NAPRYAZHENIE_V",
			159 => "KOLICHESTVO_KRANOV",
			160 => "NALICHIE_OBRATNOGO_KLAPANA",
			161 => "TIP_DATCHIKA",
			162 => "TIP_ZHELOBA_",
			163 => "TIP_KRANOV_VENTEL_SHAROVOY_KRANY",
			164 => "VYKHODNOE_NAPRYAZHENIE_V",
			165 => "DLINA_MM",
			166 => "DLYA_KOLODTSA_",
			167 => "KRAN_S_NAKIDNOY_GAYKOY",
			168 => "SPOSOB_USTANOVKI_GORIZONT_VERTIKAL",
			169 => "TIP_KLAPANA",
			170 => "ISPOLNENIE_",
			171 => "MAKS_TEPLOVAYA_MOSHCHNOST_KVT",
			172 => "REGULYATOR_POTOKA_D_POLIVA",
			173 => "TIP_NASOSA_",
			174 => "TIP_RESHETKI_",
			175 => "TSVET_LYUKA",
			176 => "VID_TOPLIVA",
			177 => "KOLICHESTVO_PATRUBKOV_SHT",
			178 => "MOSHCHNOST_NAGRUZKI_VT",
			179 => "OBLAST_PRIMENENIYA",
			180 => "TIP_REGULYATORA_DAVLENIYA",
			181 => "TIP_STOKA_",
			182 => "DIAPAZON_REGULIROVKI_DAVLENIYA_BAR",
			183 => "ZASHCHITA_OT_SUKHOGO_KHODA",
			184 => "KOLICHESTVO_TRUB_V_IZOLYATSII_SHT",
			185 => "NIZKIY_TIP_ZHELOBA",
			186 => "PROIZVODITELNOST_M3_CH_DLYA_TEPLOVYKH_PUSHEK",
			187 => "SKOROST_PERELIVA_L_MIN",
			188 => "DIAMETR_PODKLYUCHENIYA_PODVODKI",
			189 => "DIAMETR_STOKA_MM",
			190 => "KOLICHESTVO_ZON_D_POLIVA_",
			191 => "MATERIAL_KORPUSA_NASOSA",
			192 => "SREDNIY_RASKHOD_TOPLIVA_KG_CH_POK_TOL_D_TEPLO_P",
			193 => "TIP_LOTKA",
			194 => "MAKS_TRANSPORTNAYA_NAGRUZKA_T",
			195 => "MAKSIMALNAYA_TEPLOVAYA_NAGRUZKA_KVT",
			196 => "NALICHIE_WI_FI",
			197 => "NALICHIE_RESHETKI_",
			198 => "PROIZVODITELNOST_L_MIN",
			199 => "TIP_ROZZHIGA_TEP_PUSHKI_KOLONKI",
			200 => "ISPOLNENIE_KRYSHKI",
			201 => "MATERIAL_RESHETKI",
			202 => "MODULYATSIYA",
			203 => "OPISANIE_",
			204 => "SEKTOR_POLIVA_GRAD_",
			205 => "TIP_VOZDUKHOOTVODCHIKA",
			206 => "DIAMETR_NASOSA_MM",
			207 => "MAKSIMALNOE_RABOCHEE_DAVLENIE_BAR",
			208 => "PODKLYUCHENIE_KOTLOVOGO_KONTURA",
			209 => "PROIZVODITELNOST_L_C",
			210 => "RAZMER_GORLOVINY_MM_D_TRAPOV",
			211 => "TIP_IZLIVA",
			212 => "TIP_SOPLA",
			213 => "MAKSIMALNAYA_NAGRUZKA_KN_M2",
			214 => "MATERIAL_DONNOGO_KLAPANA_KRYSHKI",
			215 => "NALICHIE_MANOMETRA",
			216 => "OBEM_BAKA_L",
			217 => "PRYAMOUGOLNYY_SEKTOR_POLIVA_M",
			218 => "TIP_NAGREVATELNOGO_ELEMENTA_TEPLOVYE_PUSHKI",
			219 => "TIP_FILTRA",
			220 => "VID_SOPLA_",
			221 => "DAVLENIE_SRABATYVANIYA_BAR",
			222 => "DIAMETR_VKHODA_PATRUBKA",
			223 => "MATERIAL_KORPUSA",
			224 => "MATERIAL_KORPUSA_BAKA",
			225 => "OBEM_DROBILNOY_KAMERY_ML",
			226 => "TEPLOIZOLYATSIYA",
			227 => "VYSOTA_VSASYVANIYA_M",
			228 => "VYSOTA_KORPUSA_SM_",
			229 => "DIAMETR_VYKHODA_PATRUBKA",
			230 => "ZVUKOIZOLYATSIYA",
			231 => "MATERIAL_POVOROTNOY_NAKLADKI",
			232 => "SKOROST_VRASHCHENIYA_DVIGATEL_OB_MIN",
			233 => "_0",
			234 => "MAKS_TEMPERATURA_VODY_C",
			235 => "MATERIAL_VNUTRENNEGO_BAKA",
			236 => "MATERIAL_RESHETKI_PERELIVA",
			237 => "TIP_SPRINKLERA",
			238 => "USTANOVKA_TRUB",
			239 => "VSTROENNYY_ZAPORNYY_KLAPAN_D_POLIVA",
			240 => "DIAMETR_GORLOVINY_MM",
			241 => "DIAMETR_PODKLYUCHENIYA_OSNOVNOY_DLYA_KOLLEKTOROV",
			242 => "DLINA_SHLANGA_SISTEMY_PERELIVA_MM",
			243 => "KOLICHESTVO_SKOROSTEY",
			244 => "TIP_VODONAGREVATELYA_NAKOPITELNYY_PROTOCHNYY",
			245 => "VID_UPRAVLENIYA_",
			246 => "VSTROENNYY_TEN",
			247 => "DIAMETR_PODKLYUCHENIYA_VYKHODOV_DLYA_KOLLEKTOROV",
			248 => "KOLICHESTVO_LOPASTEY",
			249 => "MATERIAL_GIDROZATVORA",
			250 => "NALICHIE_POPLOVKA",
			251 => "VNESHNIY_DIAMETR_VENTILYATORA_MM",
			252 => "MOSHCHNOST_TEPLOOBMENNIKA_KVT",
			253 => "OBEM_RASSHIRITELNOGO_BAKA_L",
			254 => "SPOSOB_PRISOEDINENIYA_VYKHODOV_DLYA_KOLLEKTOROV_",
			255 => "TERMICHESKAYA_USTOYCHIVOST_C",
			256 => "TEN_KAKOY",
			257 => "DIAMETR_GIDROZATVORA_MM",
			258 => "ZABOR_VODY_D_NASOSOV_",
			259 => "MAKS_PROIZVODITELNOST_OBOGREVA_KVT",
			260 => "NALICHIE_RASKHODOMERA_DLYA_KOLLEKTOROV",
			261 => "OBEM_KONTURA_GVS_L_",
			262 => "SPOSOB_MONTAZHA",
			263 => "VID_SLIVA_PERELIVA",
			264 => "MAKS_PROIZVODITELNOST_OKHLAZHDENIYA_KVT",
			265 => "OSNOVNOY_DIAMETR_OGOLOVKA_MM",
			266 => "TIP_KRANOV_VENTEL_SHAROVOY_KOLLETORY",
			267 => "TIP_LYUKA_POD_PLITKU_POKRASKU",
			268 => "FORMA_KORPUSA_VODONAG_TEP_PUSHKI",
			269 => "DOPOLNITELNYY_DIAMETR_OGOLOVKA_MM",
			270 => "KOLICHESTVO_VYKHODOV_DLYA_KOLLEKTOROV_",
			271 => "PLOSHCHAD_OBOGREVA_M2",
			272 => "PO_TIPU_POTREBLYAEMOGO_TOPLIVA_",
			273 => "SISTEMA_PERELIVA",
			274 => "SHIRINA_MM",
			275 => "KOMPLEKTATSIYA",
			276 => "NAPUSK_VODY_CHEREZ_PERELIV",
			277 => "PROIZVODITELNOST_L_CH",
			278 => "SUKHOY_TEN_DA_NET",
			279 => "TIP_PITANIYA_",
			280 => "VYSOTA_SM_IZDELIYA",
			281 => "DIAMETR_PODKLYUCHENIYA",
			282 => "DIAMETR_MM",
			283 => "TIP_PITANIYA_V_VODONAGREVATELI",
			284 => "UKLON_",
			285 => "VNUTRENNEE_POKRYTIE_BAKA_VODONAGREVATELI",
			286 => "DIAMETR_VYPUSKNOGO_OTVERSTIYA_VANNY_UMYVALNIKA_DUS",
			287 => "KLASS_NAGRUZKI",
			288 => "MAKSIMALNAYA_RABOCHAYA_TEMPERATURA_C",
			289 => "SHIRINA_",
			290 => "VYSOTA_POLOVIKA_MM",
			291 => "GLUBINA_",
			292 => "DIAMETR_PODKLYUCHENIYA_K_SLIVU",
			293 => "MAKSIMALNOE_DAVLENIE_KONTURA_GVS_BAR",
			294 => "USTANOVKA_POD_RAKOVINOY_DA_NET_VODONAGREVATEL",
			295 => "DLINA_BUKHTY_M",
			296 => "MAKSIMALNOE_DAVLENIE_KONTURA_OTOPLENIYA_BAR",
			297 => "RUCHKA_KRAN",
			298 => "UGOL_POVOROTA_GRAD",
			299 => "USTANOVKA_NAD_RAKOVINOY_DA_NET_VODONAGREVATEL",
			300 => "GABARITY_VKHSHKHG_MM",
			301 => "MONTAZHNAYA_DLINNA_MM_D_TSIKRULEY_",
			302 => "PODKLYUCHENIE_D_MANOMETROV",
			303 => "TIP_BOYLERA_",
			304 => "FORMA_DLYA_MOYKI",
			305 => "DIAMETR_KORPUSA_MM",
			306 => "DIAMETR_PODKLYUCHENIYA_KONTURA_GVS",
			307 => "DLINA_SM_",
			308 => "PODKLYUCHENIE_VKHOD_VYKHOD",
			309 => "RAZMER_MM",
			310 => "GVS",
			311 => "DELIVERY",
			312 => "COMBUSTOR",
			313 => "NUMBER_COUNTERS",
			314 => "MARK",
			315 => "PAYMENT",
			316 => "POSITION",
			317 => "DISCOUNT",
			318 => "OLD_PRICE",
			319 => "COUNTRY",
			320 => "TYPE_BOILER",
			321 => "ELECTRICAL_POWER",
			322 => "MORE_PHOTO",
			323 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "Y",
		"DETAIL_SHOW_POPULAR" => "Y",
		"DETAIL_SHOW_SLIDER" => "Y",
		"DETAIL_SHOW_VIEWED" => "N",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => $_SESSION["CATALOG_SORT_FIELD"],
		"ELEMENT_SORT_FIELD2" => $_SESSION["CATALOG_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $_SESSION["CATALOG_SORT_ORDER"],
		"ELEMENT_SORT_ORDER2" => $_SESSION["CATALOG_SORT_ORDER"],
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "N",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"IBLOCK_ID" => "14",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "N",
		"INSTANT_RELOAD" => "N",
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "DISCOUNT",
			2 => "OLD_PRICE",
			3 => "",
		),
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "squre",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "30",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRICE_CODE" => array(
			0 => "Цена РРЦ",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array(
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "Y",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"SECTIONS_VIEW_MODE" => "TILE",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "1",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_TOP_ELEMENTS" => "N",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"TEMPLATE_THEME" => "blue",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ELEMENT_COUNT" => "9",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_FIELD2" => "id",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_ORDER2" => "desc",
		"TOP_LINE_ELEMENT_COUNT" => "3",
		"TOP_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_VIEW_MODE" => "SECTION",
		"USER_CONSENT" => "Y",
		"USER_CONSENT_ID" => "1",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_BIG_DATA" => "N",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"USE_COMPARE" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "Y",
		"USE_GIFTS_DETAIL" => "N",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"USE_GIFTS_SECTION" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"USE_REVIEW" => "N",
		"USE_SALE_BESTSELLERS" => "Y",
		"USE_STORE" => "N",
		"COMPONENT_TEMPLATE" => "catalog",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"LABEL_PROP" => array(
		),
		"SEF_FOLDER" => "/catalog/",
		"TOP_PROPERTY_CODE_MOBILE" => "",
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"LIST_PROPERTY_CODE_MOBILE" => array(
		),
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_SHOW_SLIDER" => "Y",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "Y",
		"FILTER_NAME" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "VES_KG",
			1 => "DLYA_TRUBY_UPONOR_PEX",
			2 => "NALICHIE_PLOSHCHADKI",
			3 => "NALICHIE_TENA",
			4 => "NEOTOZHZHENNAYA",
			5 => "OTOZHZHENNAYA",
			6 => "PODKLYUCHENIE_SO_STORONY_POTREBITELYA_",
			7 => "SHIRINA_SM",
			8 => "VOZMOZHNOST_PODKLYUCHENIYA_TENA",
			9 => "GLUBINA_SM_",
			10 => "DIAMETR_OTVERSTIYA_DLYA_MONTAZHA_MM",
			11 => "DLYA_TRUBY_UPONOR_UNI_PIPE_PLUS",
			12 => "KOLICHESTVO_KONTUROV",
			13 => "MOSHCHNOST_VT",
			14 => "NATSENKA",
			15 => "DLINA_KABELYA_M",
			16 => "DLYA_TRUBY_UPONOR_MLC",
			17 => "KOLICHESTVO_TEPLOOBMENNIKOV_DLYA_BOYLEROV",
			18 => "KOLICHESTVO_CHASH_MOYKI",
			19 => "MAKSIMALNAYA_PROIZVODITELNOST_VENTILYATSII_M3_CH",
			20 => "MOSHCHNOST_KVT",
			21 => "PORYADOK_OKRUGLENIYA",
			22 => "GLUBINA_MM",
			23 => "DLYA_TRUBY_Q_E",
			24 => "MOSHCHNOST_KOTLA_MAKSIMALNAYA_KVT_DLYA_MKS",
			25 => "NALICHIE_KRYLA_MOYKI",
			26 => "SERIYA",
			27 => "TIP_IZOLYATSII",
			28 => "CML2_ARTICLE",
			29 => "CML2_BASE_UNIT",
			30 => "DIAMETR_SVARIVAEMYKH_TRUB_MM",
			31 => "DLYA_PRESS_FITINGI_UPONOR_MLC",
			32 => "MAKSIMALNOE_DAVLENIE_BAR",
			33 => "NAZNACHENIE_D_SMESITELEY_I_SIFONOV_MANOMETR",
			34 => "NAPOR_M",
			35 => "CML2_MANUFACTURER",
			36 => "CML2_TRAITS",
			37 => "CML2_TAXES",
			38 => "TOLSHCHINA_MM",
			39 => "CML2_ATTRIBUTES",
			40 => "CML2_BAR_CODE",
			41 => "MATERIAL_NAGREVAYUSHCHEGO_ELEMENTA",
			42 => "OBEM",
			43 => "RAZMESHCHENIE_USTANOVKA_NA_POL_NA_STENU_",
			44 => "TIP_SMESITELYA_ODNA_RUCHKA_DVUKHVENTELNYY_",
			45 => "TOLSHCHINA_TRUBY_MM",
			46 => "SHIRINA_M",
			47 => "VYSOTA_IZLIVA_MM_SMESITELI",
			48 => "DLINA_M",
			49 => "KAMERA_SGORANIYA",
			50 => "MATERIAL",
			51 => "TIP_TERMOREGULYATORA",
			52 => "KHOLODNOE_VODOSNABZHENIE",
			53 => "VYSOTA_MM",
			54 => "GORYACHEE_VODOSNABZHENIE",
			55 => "MONTAZHNAYA_SHIRINA_SM",
			56 => "OTOPLENIE_DA_NET",
			57 => "TIP_RADIATORA_",
			58 => "TOLSHCHINA_FOLGI_MKM",
			59 => "GVS_DA_NET",
			60 => "DLINA_IZLIVA_MM_DLYA_SMESITELYA_",
			61 => "KOLICHESTVO_SEKTSIY",
			62 => "MONTAZHNAYA_VYSOTA_SM",
			63 => "OKHLAZHDENIE",
			64 => "POKRYTIE_D_IZOLYATSII",
			65 => "ED_IZMERENIYA",
			66 => "KONDENSATSIONNYY",
			67 => "MEZHOSEVOE_RASSTOYANIE",
			68 => "OBEM_SMYVNOGO_BACHKA_L",
			69 => "RAZMESHCHENIE_DLYA_SMESITELEY",
			70 => "SHAG_UKLADKI_SM_D_IZOLYATSII",
			71 => "BREND",
			72 => "VNUTRENNIY_DIAMETR_IZOLYATSII_MM",
			73 => "MATERIAL_TEPLOIZOLYATSII",
			74 => "OTAPLIVAEMAYA_PLOSHCHAD_M2_",
			75 => "PANEL_SMYVA_V_KOMPLEKTE",
			76 => "TIP_PODKLYUCHENIYA_RADIATORA_BOK_NIZH",
			77 => "MATERIAL_ZASHCHITNOGO_KOZHUKHA",
			78 => "NOMINALNYY_TOK_A",
			79 => "TEPLOOTDACHA_PRI_T_70_C",
			80 => "TIP_POLOTENTSESUSHITELYA",
			81 => "TOLSHCHINA_IZOLYATSII_MM_",
			82 => "UPRAVLENIE_SMYVNYM_KLAPANOM",
			83 => "DIAMETR_TRUBY_MM",
			84 => "NAPRYAZHENIE_SETI_V",
			85 => "PODKLYUCHENIE_D_POLOTENTSESUSHITELEY_",
			86 => "PROPUSKNAYA_SPOSOBNOST_M3_CH",
			87 => "STRANA",
			88 => "TIP_PODVODKI_D_ARMATURY_UNITAZNOY",
			89 => "GARANTIYA_LET",
			90 => "DIAMETR_REZBY_",
			91 => "DIAMETR_TRUBY_S_TEPLOIZOLYATSIEY_MM",
			92 => "KOLICHESTVO_SLOEV",
			93 => "NALICHIE_POLKI",
			94 => "STUPENI_MOSHCHNOSTI_KVT_DLYA_ELEKTRO_KOTOLOV",
			95 => "DVOYNOY_ELEMENT_VT",
			96 => "DIAMETR_PODKLYUCHENIE_KONTURA_OTOPLENIYA",
			97 => "DIAPOZON_IZMERENIYA_C",
			98 => "DIAPOZON_IZMERENIYA_BAR",
			99 => "KANALIZATSIYA",
			100 => "RABOCHEE_DAVLENIE_BAR",
			101 => "SPOSOB_NAGREVA_D_POLOTENTSESUSHITELEY_",
			102 => "DIAMETR_DYMOKHODA_MM_DLYA_KOTLOV",
			103 => "DRENAZH_I_FEKALNYE_VODY",
			104 => "MATERIAL_REZBY_D_ARMATURY_UNITAZNOY",
			105 => "NAZNACHENIE_",
			106 => "NAZNACHENIE_KANALIZATSIONNOY_SISTEMY",
			107 => "TIP_SCHETCHIKA",
			108 => "TSVET_",
			109 => "DLINA_REZBY_MM_D_ARMATURY_UNITAZNOY",
			110 => "KOLICHESTVO_KONTROLIRUEMYKH_UROVNEY",
			111 => "MOSHCHNOST_POTREBLYAEMAYA_VT",
			112 => "NAIMENOVANIE",
			113 => "NALICHIE_BOYLERA_DA_NET",
			114 => "TEPLOOTDACHA_VT_M2",
			115 => "TIP_KOLODTSA",
			116 => "DVOYNAYA_KNOPKA_D_ARMATURY_UNITAZNOY",
			117 => "ISPOLNENIE_LOTKOVOY_CHASTI",
			118 => "OBEM_BOYLERA",
			119 => "RAZMER_FILTRUEMYKH_CHASTITS_MKM",
			120 => "TIP_IZDELIYA",
			121 => "TIP_MATA",
			122 => "VYSOTA_KOLODTSA_SM",
			123 => "DIAMETR_OSNOVNOY",
			124 => "MOSHCHNOST_PRI_230V_VT",
			125 => "NALICHIE_STOP_KNOPKI_D_ARMATURY_UNITAZNOY",
			126 => "PROZRACHNYY_KORPUS",
			127 => "TIP_RADIATORA_PO_GLUBINE",
			128 => "VYSOTA_RADIATORA_MM_",
			129 => "VYSOTA_TELESKOPICHESKOY_TRUBY_M",
			130 => "DIAMETR_DOPOLNITELNYY",
			131 => "PLOSHCHAD_UKLADKI_M2",
			132 => "PODKHODIT_DLYA_GORYACHEY_VODY",
			133 => "REGULIRUEMAYA_DLINA_MM_D_GOFRY_SANTEKHNICHESKOY",
			134 => "DIAMETR_OSNOVNOY_TRUBY_MM",
			135 => "DLINA_RADIATORA_MM",
			136 => "NACHILIE_GAYKI_D_GOFRY_SANTEKHNICHESKOY",
			137 => "TIP_KARTRIDZHA",
			138 => "TIP_PRISOEDINENIYA",
			139 => "FOLGIROVANNYY_D_ELEKTRICHESKIKH_TEPLYKH_POLOV_",
			140 => "DIAMETR_TELESKOPICHESKOY_TRUBY_MM",
			141 => "MATERIAL_GAYKI",
			142 => "MONTAZHNAYA_VYSOTA_MM",
			143 => "TIP_REZBY_",
			144 => "TIP_RUCHKI_DLYA_KRANOV_RUCHKA_BABOCHKA",
			145 => "TIPORAZMER_KARTRIDZHA",
			146 => "DIAMETR_PATRUBKOV_MM",
			147 => "KRAN_SO_SGONOM_",
			148 => "MAKSIMALNAYA_MOSHCHNOST_VA",
			149 => "MONTAZHNAYA_GLUBINA_MM",
			150 => "RADIOBAZA",
			151 => "SKOROST_STOKA_VODY_L_MIN",
			152 => "ISPOLNENIE_KRANA_",
			153 => "KOMPLEKT_POSTAVKI",
			154 => "OBYEM_ILOSBORNIKA_L",
			155 => "PODKHODIT_DLYA_ZHELOBA_",
			156 => "TIP_STABILIZATORA",
			157 => "TIP_SHKAFA",
			158 => "VKHODNOE_NAPRYAZHENIE_V",
			159 => "KOLICHESTVO_KRANOV",
			160 => "NALICHIE_OBRATNOGO_KLAPANA",
			161 => "TIP_DATCHIKA",
			162 => "TIP_ZHELOBA_",
			163 => "TIP_KRANOV_VENTEL_SHAROVOY_KRANY",
			164 => "VYKHODNOE_NAPRYAZHENIE_V",
			165 => "DLINA_MM",
			166 => "DLYA_KOLODTSA_",
			167 => "KRAN_S_NAKIDNOY_GAYKOY",
			168 => "SPOSOB_USTANOVKI_GORIZONT_VERTIKAL",
			169 => "TIP_KLAPANA",
			170 => "ISPOLNENIE_",
			171 => "MAKS_TEPLOVAYA_MOSHCHNOST_KVT",
			172 => "REGULYATOR_POTOKA_D_POLIVA",
			173 => "TIP_NASOSA_",
			174 => "TIP_RESHETKI_",
			175 => "TSVET_LYUKA",
			176 => "VID_TOPLIVA",
			177 => "KOLICHESTVO_PATRUBKOV_SHT",
			178 => "MOSHCHNOST_NAGRUZKI_VT",
			179 => "OBLAST_PRIMENENIYA",
			180 => "TIP_REGULYATORA_DAVLENIYA",
			181 => "TIP_STOKA_",
			182 => "DIAPAZON_REGULIROVKI_DAVLENIYA_BAR",
			183 => "ZASHCHITA_OT_SUKHOGO_KHODA",
			184 => "KOLICHESTVO_TRUB_V_IZOLYATSII_SHT",
			185 => "NIZKIY_TIP_ZHELOBA",
			186 => "PROIZVODITELNOST_M3_CH_DLYA_TEPLOVYKH_PUSHEK",
			187 => "SKOROST_PERELIVA_L_MIN",
			188 => "DIAMETR_PODKLYUCHENIYA_PODVODKI",
			189 => "DIAMETR_STOKA_MM",
			190 => "KOLICHESTVO_ZON_D_POLIVA_",
			191 => "MATERIAL_KORPUSA_NASOSA",
			192 => "SREDNIY_RASKHOD_TOPLIVA_KG_CH_POK_TOL_D_TEPLO_P",
			193 => "TIP_LOTKA",
			194 => "MAKS_TRANSPORTNAYA_NAGRUZKA_T",
			195 => "MAKSIMALNAYA_TEPLOVAYA_NAGRUZKA_KVT",
			196 => "NALICHIE_WI_FI",
			197 => "NALICHIE_RESHETKI_",
			198 => "PROIZVODITELNOST_L_MIN",
			199 => "TIP_ROZZHIGA_TEP_PUSHKI_KOLONKI",
			200 => "ISPOLNENIE_KRYSHKI",
			201 => "MATERIAL_RESHETKI",
			202 => "MODULYATSIYA",
			203 => "OPISANIE_",
			204 => "SEKTOR_POLIVA_GRAD_",
			205 => "TIP_VOZDUKHOOTVODCHIKA",
			206 => "DIAMETR_NASOSA_MM",
			207 => "MAKSIMALNOE_RABOCHEE_DAVLENIE_BAR",
			208 => "PODKLYUCHENIE_KOTLOVOGO_KONTURA",
			209 => "PROIZVODITELNOST_L_C",
			210 => "RAZMER_GORLOVINY_MM_D_TRAPOV",
			211 => "TIP_IZLIVA",
			212 => "TIP_SOPLA",
			213 => "MAKSIMALNAYA_NAGRUZKA_KN_M2",
			214 => "MATERIAL_DONNOGO_KLAPANA_KRYSHKI",
			215 => "NALICHIE_MANOMETRA",
			216 => "OBEM_BAKA_L",
			217 => "PRYAMOUGOLNYY_SEKTOR_POLIVA_M",
			218 => "TIP_NAGREVATELNOGO_ELEMENTA_TEPLOVYE_PUSHKI",
			219 => "TIP_FILTRA",
			220 => "VID_SOPLA_",
			221 => "DAVLENIE_SRABATYVANIYA_BAR",
			222 => "DIAMETR_VKHODA_PATRUBKA",
			223 => "MATERIAL_KORPUSA",
			224 => "MATERIAL_KORPUSA_BAKA",
			225 => "OBEM_DROBILNOY_KAMERY_ML",
			226 => "TEPLOIZOLYATSIYA",
			227 => "VYSOTA_VSASYVANIYA_M",
			228 => "VYSOTA_KORPUSA_SM_",
			229 => "DIAMETR_VYKHODA_PATRUBKA",
			230 => "ZVUKOIZOLYATSIYA",
			231 => "MATERIAL_POVOROTNOY_NAKLADKI",
			232 => "SKOROST_VRASHCHENIYA_DVIGATEL_OB_MIN",
			233 => "_0",
			234 => "MAKS_TEMPERATURA_VODY_C",
			235 => "MATERIAL_VNUTRENNEGO_BAKA",
			236 => "MATERIAL_RESHETKI_PERELIVA",
			237 => "TIP_SPRINKLERA",
			238 => "USTANOVKA_TRUB",
			239 => "VSTROENNYY_ZAPORNYY_KLAPAN_D_POLIVA",
			240 => "DIAMETR_GORLOVINY_MM",
			241 => "DIAMETR_PODKLYUCHENIYA_OSNOVNOY_DLYA_KOLLEKTOROV",
			242 => "DLINA_SHLANGA_SISTEMY_PERELIVA_MM",
			243 => "KOLICHESTVO_SKOROSTEY",
			244 => "TIP_VODONAGREVATELYA_NAKOPITELNYY_PROTOCHNYY",
			245 => "VID_UPRAVLENIYA_",
			246 => "VSTROENNYY_TEN",
			247 => "DIAMETR_PODKLYUCHENIYA_VYKHODOV_DLYA_KOLLEKTOROV",
			248 => "KOLICHESTVO_LOPASTEY",
			249 => "MATERIAL_GIDROZATVORA",
			250 => "NALICHIE_POPLOVKA",
			251 => "VNESHNIY_DIAMETR_VENTILYATORA_MM",
			252 => "MOSHCHNOST_TEPLOOBMENNIKA_KVT",
			253 => "OBEM_RASSHIRITELNOGO_BAKA_L",
			254 => "SPOSOB_PRISOEDINENIYA_VYKHODOV_DLYA_KOLLEKTOROV_",
			255 => "TERMICHESKAYA_USTOYCHIVOST_C",
			256 => "TEN_KAKOY",
			257 => "DIAMETR_GIDROZATVORA_MM",
			258 => "ZABOR_VODY_D_NASOSOV_",
			259 => "MAKS_PROIZVODITELNOST_OBOGREVA_KVT",
			260 => "NALICHIE_RASKHODOMERA_DLYA_KOLLEKTOROV",
			261 => "OBEM_KONTURA_GVS_L_",
			262 => "SPOSOB_MONTAZHA",
			263 => "VID_SLIVA_PERELIVA",
			264 => "MAKS_PROIZVODITELNOST_OKHLAZHDENIYA_KVT",
			265 => "OSNOVNOY_DIAMETR_OGOLOVKA_MM",
			266 => "TIP_KRANOV_VENTEL_SHAROVOY_KOLLETORY",
			267 => "TIP_LYUKA_POD_PLITKU_POKRASKU",
			268 => "FORMA_KORPUSA_VODONAG_TEP_PUSHKI",
			269 => "DOPOLNITELNYY_DIAMETR_OGOLOVKA_MM",
			270 => "KOLICHESTVO_VYKHODOV_DLYA_KOLLEKTOROV_",
			271 => "PLOSHCHAD_OBOGREVA_M2",
			272 => "PO_TIPU_POTREBLYAEMOGO_TOPLIVA_",
			273 => "SISTEMA_PERELIVA",
			274 => "SHIRINA_MM",
			275 => "KOMPLEKTATSIYA",
			276 => "NAPUSK_VODY_CHEREZ_PERELIV",
			277 => "PROIZVODITELNOST_L_CH",
			278 => "SUKHOY_TEN_DA_NET",
			279 => "TIP_PITANIYA_",
			280 => "VYSOTA_SM_IZDELIYA",
			281 => "DIAMETR_PODKLYUCHENIYA",
			282 => "DIAMETR_MM",
			283 => "TIP_PITANIYA_V_VODONAGREVATELI",
			284 => "UKLON_",
			285 => "VNUTRENNEE_POKRYTIE_BAKA_VODONAGREVATELI",
			286 => "DIAMETR_VYPUSKNOGO_OTVERSTIYA_VANNY_UMYVALNIKA_DUS",
			287 => "KLASS_NAGRUZKI",
			288 => "MAKSIMALNAYA_RABOCHAYA_TEMPERATURA_C",
			289 => "SHIRINA_",
			290 => "VYSOTA_POLOVIKA_MM",
			291 => "GLUBINA_",
			292 => "DIAMETR_PODKLYUCHENIYA_K_SLIVU",
			293 => "MAKSIMALNOE_DAVLENIE_KONTURA_GVS_BAR",
			294 => "USTANOVKA_POD_RAKOVINOY_DA_NET_VODONAGREVATEL",
			295 => "DLINA_BUKHTY_M",
			296 => "MAKSIMALNOE_DAVLENIE_KONTURA_OTOPLENIYA_BAR",
			297 => "RUCHKA_KRAN",
			298 => "UGOL_POVOROTA_GRAD",
			299 => "USTANOVKA_NAD_RAKOVINOY_DA_NET_VODONAGREVATEL",
			300 => "GABARITY_VKHSHKHG_MM",
			301 => "MONTAZHNAYA_DLINNA_MM_D_TSIKRULEY_",
			302 => "PODKLYUCHENIE_D_MANOMETROV",
			303 => "TIP_BOYLERA_",
			304 => "FORMA_DLYA_MOYKI",
			305 => "DIAMETR_KORPUSA_MM",
			306 => "DIAMETR_PODKLYUCHENIYA_KONTURA_GVS",
			307 => "DLINA_SM_",
			308 => "PODKLYUCHENIE_VKHOD_VYKHOD",
			309 => "RAZMER_MM",
			310 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "Цена РРЦ",
		),
		"SECTIONS_HIDE_SECTION_NAME" => "N",
		"DISCOUNT_PERCENT_POSITION" => "top-right",
		"DETAIL_SLIDER_INTERVAL" => "5000",
		"DETAIL_SLIDER_PROGRESS" => "N",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"USE_MIN_AMOUNT" => "Y",
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"FIELDS" => array(
			0 => "",
			1 => "",
		),
		"MIN_AMOUNT" => "10",
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"STORE_PATH" => "/store/#store_id#",
		"MAIN_TITLE" => "Наличие на складах",
		"SCROLL_PROPERTY" => array(
			0 => "VES_KG",
			1 => "GLUBINA_MM",
		),
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/#SMART_FILTER_PATH#",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>