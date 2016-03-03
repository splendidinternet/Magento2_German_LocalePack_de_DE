# Magento 2 German LocalePack de_DE

Deutsches Sprachpaket für Magento 2 Community Edition

Die Übersetzung wurde von deutschen Muttersprachlern nach eigenem Ermessen vorgenommen. Die Übersetzung ist komplett, d.h. alle Sprachausgaben von Magento 2 wurden vom Englischen ins Deutsche übersetzt. Gern können Änderungsvorschläge eingebracht oder auch das gesamte Repository geforkt werden, wenn abweichende Übersetzungen eingebracht werden sollen.

Es gibt hier https://crowdin.com/project/magento-2/de auch einen Ansatz für die deutsche Übersetzung, aber das ist noch nicht weit fortgeschritten. 
Und für Magento 1.x gibt es weiterhin das deutsche Sprachpaket von Rico Neitzel: https://github.com/riconeitzel/German_LocalePack_de_DE

# Installation
 - Alle Dateien nach `/app/i18n/splendid/de_DE/` kopieren

Aus dem Magento-Root-Verzeichnis folgende Befehle aufrufen:
```bash
rm pub/static/frontend/Magento/luma/de_DE/js-translation.json
php bin/magento setup:static-content:deploy de_DE
php bin/magento setup:upgrade
rm -rf var/di
php bin/magento setup:di:compile
```

# Installation mit Composer
```bash
composer require splendidinternet/mage2-locale-de-de
rm pub/static/frontend/Magento/luma/de_DE/js-translation.json
php bin/magento setup:static-content:deploy de_DE
```

# Bekannte Probleme und Workarounds

## Warenkorb-Button unvollständig übersetzt

Es gibt zum Teil noch Probleme mit JavaScript-Widgets und Übersetzungen. Die Übersetzungen werden asynchron entweder aus der `js-translation.json` oder aus dem Local-Storage geladen. Gleichzeitig werden die Widgets geladen, so dass bei einigen Widgets die Übersetzungen noch nicht geladen sind, z.B. der Warenkorb-Button.

### Workaround

In der Datei `/frontend/templates/product/list.phtml` folgenden Block ca. Zeile 140 anpassen:
```html
<script type="text/x-magento-init">
{    "[data-role=tocart-form], .form.map.checkout": {
       "catalogAddToCart": {
           "addToCartButtonTextDefault": "<?php echo __('Add to Cart'); ?>",
           "addToCartButtonTextWhileAdding": "<?php echo __('Adding...'); ?>",
           "addToCartButtonTextAdded": "<?php echo __('Added'); ?>"
       }
   }
}
</script>
```

In der Datei `/frontend/templates/product/view/addtocart.phtml` den `submitHandler` ca. Zeile 67 wie folgt anpassen:
```javascript
           submitHandler: function (form) {
               var widget = $(form).catalogAddToCart({
                   bindSubmit: false,
                   "addToCartButtonTextDefault": "<?php echo __('Add to Cart'); ?>",
                   "addToCartButtonTextWhileAdding": "<?php echo __('Adding...'); ?>",
                   "addToCartButtonTextAdded": "<?php echo __('Added'); ?>"
               });
               
               widget.catalogAddToCart('submitForm', $(form));
               
               return false;
           }
```

## Fortschritte im Checkout nicht übersetzt

Dies ist ein [Bug in Magento](https://github.com/magento/magento2/issues/2652), der bereits im `develop` Branch [gefixt](https://github.com/magento/magento2/commit/9a49f89fe833ff514c1d9edd30862364c3573e33) wurde - jedoch ist dieser Fix noch nicht in einem Release enthalten. Derzeit gibt es keinen Workaround, da Anpassungen der Javascript-Dateien unter `/vendor/` nötig sind.
