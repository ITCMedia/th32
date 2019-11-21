<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?><div class="content-block">
	<div class="text-bl-grid">
		<div class="text-bl-grid__half-col">
			<p>
				На страницах нашего каталога вы сможете найти все необходимое для организации систем отопления, водоснабжения, водоотведения на объект любой сложности. Котлы. радиаторы, теплый пол, насосы, трубы, фильтра, запорная арматура, фитинги и водонагреватели.
			</p>
		</div>
		<div class="text-bl-grid__half-col">
			<p>
				Сотрудничество с европейскими, азиатскими и американскими производителями позволяет нам предлагать аналогичную продукцию разных ценовых категорий, а гибкая система скидок позволит сэкономить деньги.
			</p>
		</div>
	</div>
</div>
<div class="content-block">
	<div class="title-site--h1">
		Услуги
	</div>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"services",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
</div>
<p>
	<a name="delivery"></a>
</p>
<div class="content-block content-block--visible" id="delivery">
	<div class="title-site--h1">
		Доставка, оплата, возврат
	</div>
	<div class="korpus">
		<ul class="tabs js-tabs tabs--2">
			<li class="current">Доставка</li>
			<li>Оплата</li>
			<li>Возврат</li>
		</ul>
		<div class="box visible">
			<div class="delivery">
				<div class="delivery-aside">
					<div class="title-site--h2">
						Доставка
					</div>
					<ul class="delivery-aside-nav">
						<li><a href="#delivery1" class="scrollto">До транспортной компании</a></li>
						<li><a href="#delivery2" class="scrollto">По брянску</a></li>
						<li><a href="#delivery3" class="scrollto">Самовывоз Брянск</a></li>
						<li><a href="#delivery4" class="scrollto">По РФ</a></li>
					</ul>
					<div class="delivery-info">
						<div class="title-site--h2">
							Важная информация о&nbsp;доставке
						</div>
 <a href="#popup-info" data-fancybox="" class="btn btn--max btn--border">Прочитать</a>
					</div>
				</div>
				<div class="content-delivery">
					<div class="content-delivery__block" id="delivery1">
						<div class="title-site--h4">
							Доставка до транспортной компании
						</div>
						<p>
							Доставка в регионы России осуществляется по 100% предоплате следующими транспортными компаниями:
						</p>
						 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"delivery",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "delivery",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"DOCS",2=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
						<p>
							Для согласования отправки товара через транспортную компанию покупатель предоставляет письмо-запрос на отгрузку через выбранную транспортную компанию. Клиентам-юридическим лицам также нужно предоставить копию доверенности на право подписи письма.
						</p>
						<p>
							При приёмке товара необходимо удостовериться в том, что упаковка и печати не нарушены. Если упаковка нарушена, составляется акт о нарушении упаковки и комплектности. Акт обязан подписать экспедитор. После этого заверенный акт отправляется компании.
						</p>
						<p>
							Риск случайной утраты или повреждения изделия переходит к покупателю с момента передачи товара в транспортную компанию.
						</p>
					</div>
					<div class="content-delivery__block" id="delivery2">
						<div class="title-site--h4">
							Доставка по Брянску
						</div>
						<p>
							Доставка товара по г. Брянск осуществляется ежедневно с 09:00 до 19.00. Для выбора оптимального варианта доставки и ее условий с вами свяжется наш менеджер.
						</p>
					</div>
					<div class="content-delivery__block" id="delivery3">
						<div class="title-site--h4">
							Самовывоз Брянск
						</div>
						<div class="content-delivery-contacts">
							<div class="content-delivery-contacts__item">
								<p>
									Самовывоз осуществляется в рабочее время работы:
								</p>
								<div class="time-work">
									<div>
										Пн-Сб: 9:00-17:30
									</div>
									<div>
										Вс: 9:00-15:30
									</div>
								</div>
								<p>
									ул. Сталелитейная, строение 14, Торговый комплекс "СтройМаркет" павильон 123
								</p>
								<div class="phone-delivery">
									<p>
										Контактный телефон:
									</p>
									<div>
										<a href="tel:84832312331" class="title-site--h3">8 (4832) 31-23-31</a>
									</div>
									<p>
									</p>
								</div>
							</div>
							<div class="content-delivery-contacts__routes">
								<div class="title-site--h4">
									Пути проезда
								</div>
								<p>
									В ТК «СтройМаркет» можно добраться на общественном транспорте:
								</p>
								<div class="routes">
									<div class="routes-item">
										<div class="routes-item__img">
 <i class="icon icon-bus"></i>
										</div>
										<div class="routes-item__txt">
											<div class="title-site--h4">
												Автобусы
											</div>
											<p>
												№3, 26, 54, 104
											</p>
										</div>
									</div>
									<div class="routes-item">
										<div class="routes-item__img">
 <i class="icon icon-minibus"></i>
										</div>
										<div class="routes-item__txt">
											<div class="title-site--h4">
												Маршрутные такси
											</div>
											<p>
												№15, 36, 51, 64, 77, 104, 161
											</p>
										</div>
									</div>
								</div>
								<p>
									Проехать на автомашине можно как непосредственно из Бежицкого, так и из Советского района: от «Самолета» по Смоленской трассе — поворот на Дятьково, далее по объездной — поворот на Брянск. Время в пути из Советского района по указанному маршруту составляет около 15 минут.
								</p>
							</div>
						</div>
					</div>
					<div class="content-delivery__block" id="delivery4">
						<div class="title-site--h4">
							Доставка по РФ
						</div>
						<p>
							Осуществляется любой транспортной компанией (при наличии таковой в городе Брянск).
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="box">
			<div class="payment">
				<div class="title-site--h2">
					Оплата
				</div>
				<p>
					Оплатить товар можно 3 способами:
				</p>
				<ul class="list-info">
					<li>
					<div class="list-info-img">
 <i class="icon icon-cash"></i>
					</div>
					<div class="list-info-txt">
						<div class="title-site--h4">
							Наличными
						</div>
						<p>
							Вы рассчитываетесь наличными в точке выдачи заказа.
						</p>
					</div>
 </li>
					<li>
					<div class="list-info-img">
 <i class="icon icon-online"></i>
					</div>
					<div class="list-info-txt">
						<div class="title-site--h4">
							Онлайн оплата
						</div>
						<p>
							Мы принимаем оплату по средствам карт или выставления счёта.
						</p>
					</div>
 </li>
					 <!--					<li>--> <!--						<div class="list-info-img">--> <!--							<i class="icon icon-card"></i>--> <!--						</div>--> <!--						<div class="list-info-txt">--> <!--							<div class="title-site--h4">Картой при получении</div>--> <!--							<p>Расплачиваетесь с помощью банковской карты после получении товара</p>--> <!--						</div>--> <!--					</li>-->
					<li>
					<div class="list-info-img">
 <i class="icon icon-bank"></i>
					</div>
					<div class="list-info-txt">
						<div class="title-site--h4">
							Перевести деньги на счет
						</div>
						<p>
							Заполняете и отправляете необходимые данные для составления счета и переводите деньги до доставки товара.
						</p>
					</div>
 </li>
				</ul>
			</div>
		</div>
		<div class="box">
			<div class="back-product">
				<div class="title-site--h2">
					Возврат
				</div>
				<p>
					Гарантируется обмен товара, имеющего заводской брак, в течение двух месяцев при условии предъявления накладной на закупку данного товара. Товар, подвергшийся разборке или имеющий механические повреждения (товара или упаковки), возврату и обмену не подлежит. Во всех остальных случаях решение о возможности возврата принимается руководителем отдела продаж компании.
				</p>
			</div>
		</div>
	</div>
</div>
<div class="content-block">
	<div class="payment__block">
		<div class="payment__item">
 <img src="/local/templates/warmhouse/img/payment-mir-logo.png" alt="" class="payment__item-img">
		</div>
		<div class="payment__item">
 <img src="/local/templates/warmhouse/img/payment-visa-logo.png" alt="" class="payment__item-img">
		</div>
		<div class="payment__item">
 <img src="/local/templates/warmhouse/img/payment-visa-electron-logo.png" alt="" class="payment__item-img">
		</div>
		<div class="payment__item">
 <img src="/local/templates/warmhouse/img/payment-mastercard-logo.png" alt="" class="payment__item-img">
		</div>
		<div class="payment__item">
 <img src="/local/templates/warmhouse/img/payment-maestro-logo.png" alt="" class="payment__item-img">
		</div>
	</div>
	<div class="payment__block-description">
		<p>
			Для оплаты (ввода реквизитов Вашей карты) Вы&nbsp;будете перенаправлены на&nbsp;платежный шлюз ПАО СБЕРБАНК. Соединение с&nbsp;платежным шлюзом и&nbsp;передача информации осуществляется в&nbsp;защищенном режиме с&nbsp;использованием протокола шифрования SSL. В&nbsp;случае если Ваш банк поддерживает технологию безопасного проведения интернет-платежей Verified By&nbsp;Visa или MasterCard SecureCode для проведения платежа также может потребоваться ввод специального пароля.
		</p>
		<p>
			Настоящий сайт поддерживает 256-битное шифрование. Конфиденциальность сообщаемой персональной информации обеспечивается ПАО СБЕРБАНК. Введенная информация не&nbsp;будет предоставлена третьим лицам за&nbsp;исключением случаев, предусмотренных законодательством РФ. Проведение платежей по&nbsp;банковским картам осуществляется в&nbsp;строгом соответствии с&nbsp;требованиями платежных систем МИР, Visa Int.&nbsp;и&nbsp;MasterCard Europe Sprl.
		</p>
	</div>
</div>
<div class="content-block">
	<div class="title-site--h1">
		Условия сотрудничества для поставщиков
	</div>
	<p>
		Наша компания постоянно обновляет и дополняет ассортимент продукции, представленной в каталоге. Мы открыты для сотрудничества и готовы рассматривать предложения от новых поставщиков.
	</p>
	<p>
		Мы ждём от своих поставщиков надёжности, ответственности, качества продукции, разумных цен и своевременного выполнения заказов и готовы предложить вам рост продаж с нашей помощью.
	</p>
	<p>
		Мы предлагаем вам сотрудничество на взаимовыгодных условиях и ждем ваших предложений!
	</p>
	<p>
		Пишите нам на E-mail: <a class="link-content" href="mainto:teplohouse32@mail.ru">teplohouse32@mail.ru</a>
	</p>
</div>
<div id="popup-info" style="display: none;" class="st-modal popup-info">
	<div class="modal-cont">
		<div class="modal-cont__block">
			<div class="title-site--h1">
				Получение товара
			</div>
			<p>
				Внимание! Доставка по Брянску и Брянской области осуществляется до подъезда или до места, куда может беспрепятственно подъехать грузовой автомобиль и где можно беспрепятственно произвести выгрузку товара, а также, до пунктов приема груза транспортными компаниями, осуществляющими перевозку в регионы. Сотрудники компании НЕ выполняют обязанности грузчиков и НЕ перемещают доставленный товар от места выгрузки. Выгрузка и дальнейшая транспортировка товара осуществляется силами покупателя.
			</p>
			<p>
				При доставке до Покупателя продавец несет ответственность за внешний вид товара до момента приема-передачи его Покупателю. Прием товара покупателем производится в присутствии работников транспортной компании по внешнему виду и комплектации. Претензии по внешнему виду и комплектации доставленного товара, в соответствии со ст. 458 и 459 ГК РФ, возможно, предъявить только до передачи товара Продавцом Покупателю. С момента приема-передачи товара обязанность продавца по передаче товара считается исполненной, и риск случайной утраты или повреждения товара переходит к покупателю. Факт приема товара Покупателем подтверждается подписью в «Договоре купли - продажи» в графе «Акт приема - передачи». Если внешний вид или комплектация товара не соответствуют надлежащему качеству, покупатель вправе не принимать товар.
			</p>
			<p>
				Получить товар может лицо, сделавшее заказ, или иное лицо, находящееся по указанному в заказе адресу и готовое оплатить и принять товар.
			</p>
		</div>
		<div class="modal-cont__block">
			<div class="title-site--h2">
				При получении Вам необходимо
			</div>
			<div class="text-bl">
				<ol>
					<li>Проверить внешний вид товара на предмет царапин, сколов и др. механических повреждений.</li>
					<li>Проверить комплектность товара.</li>
					<li>Если нареканий нет, оплатите и примите товар.</li>
				</ol>
			</div>
		</div>
		<div class="modal-cont__block">
			<div class="title-site--h2">
				После приемки товара Покупателем, Продавец не принимает претензий по ассортименту, внешнему виду и количеству.
			</div>
			<p>
				При заключении договора купли-продажи (оплата по факту получения товара является договором купли-продажи), Покупатель получает от Продавца следующие документы:
			</p>
			<div class="text-bl">
				<ol>
					<li>Проверить внешний вид товара на предмет царапин, сколов и др. механических повреждений.</li>
					<li>Проверить комплектность товара.</li>
					<li>Если нареканий нет, оплатите и примите товар.</li>
				</ol>
			</div>
		</div>
		<div class="modal-cont__block">
			<div class="text-bl-grid">
				<div class="text-bl-grid__half-col">
					<div class="title-site--h1 title-site--max">
						Обратите<br>
						 внимание!
					</div>
				</div>
				<div class="text-bl-grid__half-col text-bl-grid__half-col--2">
					<p>
						Сотрудник службы доставки, не является техническим специалистом и, следовательно, давать квалифицированные консультации по работе, монтажу и т. д. изделия не может.
					</p>
					<p>
						Часть товаров поставляется с нарушенной (вскрытой) заводской упаковкой. Это необходимо для заполнения гарантийных талонов.
					</p>
				</div>
			</div>
		</div>
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>