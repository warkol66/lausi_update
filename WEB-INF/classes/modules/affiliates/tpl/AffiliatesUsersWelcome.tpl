<h2>|-assign var="userInfo" value=$loginAffiliateUser->getAffiliateUserInfo()-|
|-$userInfo->getName()-|, |-$userInfo->getSurname()-| - Bienvenido al Sistema |-$parameters.siteName-|</h2>
<p>Su último ingreso al sistema fue el <strong>|-$loginAffiliateUser->getLastLogin()|change_timezone|date_format:"%d-%m-%Y a las %R"-|</strong>
|-if $parameters.affiliateNews ne ''-|
<br>
<br>|-$parameters.affiliateNews-|
|-/if-|
</p>
