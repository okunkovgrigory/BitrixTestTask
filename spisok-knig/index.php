<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Список книг");
?>
<?
	CModule::IncludeModule("iblock");
	$arSelect = Array("ID", "NAME", "IBLOCK_ID"); // Указываем список параметров, которые будем использовать
	$arFilter = Array("IBLOCK_ID"=>1); // Указываем параметры фильтра, по которым будем выводить элементы
	$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect); // Вызов 
	while($ob = $res->GetNextElement())
	{
		$arFields = $ob->GetFields();
		$arProperties = $ob->GetProperties();
		echo $arFields["ID"].'. '.$arFields["NAME"].'. Автор: '.$arProperties["ATT_AUTHOR"]["VALUE"].'<br>';
	}
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
