<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавление всех свойств в умный фильтр");

$ID_IBLOCK = 14 ;

echo "<table>";
echo "<tr><td>Имя</td><td>Код</td><td>Ошибка обновление</td></tr>";
if (CModule::IncludeModule('iblock')) {
    $properties = CIBlockProperty::GetList(
        Array("sort" => "asc", "name" => "asc"),
        Array("ACTIVE" => "Y", "IBLOCK_ID" => $ID_IBLOCK)
    );
    while ($prop_fields = $properties->GetNext()) {
		echo "<tr>";
        $propId = $prop_fields['~ID'];
		echo "<td>".$prop_fields["NAME"]."</td>";
		echo "<td>".$prop_fields["CODE"]."</td>";

		$arFields = Array('SMART_FILTER' => 'Y', 'IBLOCK_ID' => $ID_IBLOCK);
		$addToSmart = new CIBlockProperty();
        if(!$addToSmart->Update($propId, $arFields))
			echo $addToSmart->LAST_ERROR;

		echo "</tr>";
    }
}
echo "</table>";
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>