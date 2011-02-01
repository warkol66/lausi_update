<h2>|-assign var="userInfo" value=$loginUser->getUserInfo()-||-$userInfo->getName()-|, |-$userInfo->getSurname()-|<br>
Bienvenido al Sistema |-$parameters.siteName-|</h2>
<p>Su último ingreso al sistema fue el <strong>|-$loginUser->getLastLogin()|change_timezone|date_format:"%d-%m-%Y a las %R"-|</strong>
|-if $parameters.news ne ''-|
<br>
<br>|-$parameters.news-|
|-/if-|
</p>

<p>A continuacion se ven las disponibilidades de carteleras en los proximos dias</p>
<p>
|-include_module module=LausiReports action=AvailableBillboards -|
</p>
