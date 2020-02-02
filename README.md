# Magento 2 German LocalePack de_DE

Deutsches Sprachpaket für Magento 2 Community Edition (Version 2.3.3)

Die Übersetzung wurde von deutschen Muttersprachlern nach eigenem Ermessen vorgenommen. Die Übersetzung ist komplett, d.h. alle Sprachausgaben von Magento 2 wurden vom Englischen ins Deutsche übersetzt. Gern können Änderungsvorschläge eingebracht oder auch das gesamte Repository geforkt werden, wenn abweichende Übersetzungen eingebracht werden sollen.

Es gibt hier https://crowdin.com/project/magento-2/de auch einen Ansatz für die deutsche Übersetzung, aber das ist noch nicht weit fortgeschritten. 
Und für Magento 1.x gibt es weiterhin das deutsche Sprachpaket von Rico Neitzel: https://github.com/riconeitzel/German_LocalePack_de_DE

# Installation
 - Alle Dateien nach `/app/i18n/splendid/de_DE/` kopieren

Aus dem Magento-Root-Verzeichnis folgende Befehle aufrufen:
```bash
rm pub/static/frontend/Magento/luma/de_DE/js-translation.json
php bin/magento setup:static-content:deploy -f de_DE
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

# Add new phrases

To translate new phrases follow these steps:

### Get phrases from Magento

Run this in your Magento 2 installation:

```bash
php bin/magento i18n:collect-phrases -m > phrases.csv
```

### Compare phrases with old translation file

Copy the `phrases.csv` into this repository and run:

```bash
php check_new.php
```

This will output a new file `de_DE_new.csv` which only contains the
phrases that are not yet translated in `de_DE.csv`.

### Translate phrases

Now you should translate these phrases. Enter the translated phrase
in the *second* column.

### Copy new phrases and create a pull request

Copy the new phrases to `de_DE.csv`.

**IMPORTANT**: sort the file alphabetically based on the first column, e.g. with LibreOffice.

Now create a [new pull request](https://help.github.com/articles/creating-a-pull-request/) with
your changes!
