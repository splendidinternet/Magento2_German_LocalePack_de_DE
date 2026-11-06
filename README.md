# Magento 2 German LocalePack de_DE

Deutsches Sprachpaket (de_DE) für **Magento Open Source 2.4** und **Mage-OS**, gepflegt von der [Splendid Internet GmbH](https://www.splendid-internet.de/).

Getestet mit Magento Open Source 2.4.7 und 2.4.9 sowie Mage-OS 4.0.0. Das Paket übersetzt Backend und Frontend und enthält auch Texte für Module, die Mage-OS mitbringt (zum Beispiel den KI-Assistenten Mago, SEO, Produktfeeds und Passkey-Anmeldung), für das Hyvä Theme und für verbreitete Erweiterungen wie den Akeneo Connector und Mollie. Ältere Versionen von Magento 2.4 werden weiter unterstützt. Module, die es nur in Adobe Commerce gibt, sind nicht vollständig übersetzt.

Die Übersetzungen stammen von deutschen Muttersprachlern. Fehlende oder bessere Übersetzungen sind als Pull Request willkommen (siehe unten).

Für Magento 1 gibt es das deutsche Sprachpaket von Rico Neitzel: https://github.com/riconeitzel/German_LocalePack_de_DE

German language pack (de_DE) for **Magento Open Source 2.4** and **Mage-OS**, maintained by Splendid Internet GmbH. Tested with Magento Open Source 2.4.7 and 2.4.9 and Mage-OS 4.0.0. It covers backend and frontend, including modules bundled with Mage-OS (such as the Mago AI assistant), the Hyvä theme and common extensions. Contributions are welcome as pull requests.

# Installation mit Composer

```bash
composer require splendidinternet/mage2-locale-de-de
bin/magento setup:upgrade
bin/magento setup:static-content:deploy -f de_DE
bin/magento cache:flush
```

Im Production-Modus zusätzlich `bin/magento setup:di:compile` vor dem Static-Content-Deploy. Bei einem Update des Pakets reicht `composer update splendidinternet/mage2-locale-de-de`, danach Static-Content-Deploy und `cache:flush`.

# Installation ohne Composer

Alle Dateien dieses Repositorys nach `app/i18n/splendid/de_de/` kopieren, danach dieselben Befehle wie oben ab `setup:upgrade`.

# Sprache einschalten

- **Frontend:** `Shops` -> `Konfiguration` -> `Allgemein` -> `Allgemein` -> `Regionale Optionen` -> `Region` auf Deutsch (Deutschland), im gewünschten Bereich (Website oder Store View). Im englischen Backend heißt das `Stores` -> `Configuration` -> `General` -> `General` -> `Locale Options` -> `Locale`.
- **Backend:** je Benutzer unter `Kontoeinstellung` -> `Schnittstelle Sprachumgebung` (`Account Setting` -> `Interface Locale`), für andere Benutzer unter `System` -> `Berechtigungen` -> `Alle Benutzer`.

# Neue Texte ergänzen

### Texte aus Magento sammeln

In einer Magento- oder Mage-OS-Installation:

```bash
bin/magento i18n:collect-phrases -m -o phrases.csv
```

### Mit der vorhandenen Übersetzung abgleichen

`phrases.csv` in dieses Repository kopieren und ausführen:

```bash
php check_new.php
```

Das Skript schreibt `de_DE_new.csv` mit allen Texten, die in `de_DE.csv` noch fehlen.

### Übersetzen und einfügen

Die Übersetzung in die *zweite* Spalte eintragen und die neuen Zeilen in `de_DE.csv` übernehmen. Die Datei ist ohne Beachtung der Groß- und Kleinschreibung nach der ersten Spalte sortiert, neue Zeilen bitte passend einsortieren und bestehende Zeilen nicht verändern. Begriffe wie in der vorhandenen Übersetzung verwenden (zum Beispiel „Shops“, „Store View“, „Konfiguration“), Anrede „Sie“. Platzhalter wie `%1` und HTML bleiben unverändert.

### Pull Request stellen

Dann einen [Pull Request](https://docs.github.com/de/pull-requests) mit den Änderungen stellen.

# Releases

Neue Versionen erscheinen als GitHub-Release mit Tag (zum Beispiel `1.73.0`) und sind kurz danach über [Packagist](https://packagist.org/packages/splendidinternet/mage2-locale-de-de) installierbar.
