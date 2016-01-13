# Magento 2 German LocalePack de_DE

Deutsches Sprachpaket für Magento 2 Community Edition

Die Übersetzung wurde von deutschen Muttersprachlern nach eigenem Ermessen vorgenommen. Die Übersetzung ist komplett, d.h. alle Sprachausgaben von Magento 2 wurden vom Englischen ins Deutsche übersetzt. Gern können Änderungsvorschläge eingebracht oder auch das gesamte Repository geforkt werden, wenn abweichende Übersetzungen eingebracht werden sollen.

Es gibt hier https://crowdin.com/project/magento-2/de auch einen Ansatz für die deutsche Übersetzung, aber das ist noch nicht weit fortgeschritten. 
Und für Magento 1.x gibt es weiterhin das deutsche Sprachpaket von Rico Neitzel: https://github.com/riconeitzel/German_LocalePack_de_DE

# Installation
 - Alle Dateien nach `/app/n18i/splendid/de_DE/` kopieren
```bash
bin/magento setup:static-content:deploy de_DE
bin/magento setup:upgrade
rm -rf var/di
bin/magento setup:di:compile
```
