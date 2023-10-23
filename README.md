## Logio - úkol v PHP
#### Vojtěch Mimochodek

- Úkol je vytvořen ve frameworku Symfony 6.3 s MySQL (mariadb) a Doctrine ORM
- Veškerá aplikace běží v Dockeru

### Instalace
- Naklonujeme si repozitář
- V rootu projektu zadáme `docker-compose up -d`
- Připojíme se do konzole kontejneru `web` a vygenerujeme si databázové schéma pomocí příkazu `php bin/console doctrine:schema:create`
- Aplikace běží na `http://localhost:8080`. Příklad použití: `http://localhost:8080/product/{id}`.
- Databáze běží v kontejneru na portu 3306, na lokalhost je delegována na 33006. K databázi je možné přistoupit přes rozhraní Adminer na `http://localhost:8081` (host: db, user: logio, password: logio, databaze: logio)


K vypracování úkolu bylo v případě ukládání "marketingových" dat o zobrazení produktu využita databáze namísto ukládání do souboru v plain-textu. Myslím si, že je to vhodnější přístup. Pro cache byla využita Symfony/Cache.
Pro přepnutí mezi MySQLDriver či ElasticSearchDriver lze jednoduše prohodit závislost v konfiguraci. To stejné platí u cache.
