#Cloned site: Loose Reins

This is a full clone of the website of [Loose Reins](https://www.loosereins.co.uk/). It is still a work in progress. Theres an estimated 20-30 hours left. 

####16/03/2019
Hours spent: 35h \
Commits: 38

##Setting up the site

1. `git clone https://github.com/bigblobby/gf_loose_reins.git`
2. In your terminal run `composer install` and then `yarn install`
3. make a `.env.local` file, copy the contents from `.env`
4. Change this line `DATABASE_URL=mysql://USER_NAME:PASSWORD@127.0.0.1:3306/DB_NAME` replace USERNAME, PASSWORD and DB_NAME with your database credentials
5. Windows users might need to prepend `php` to the start of the next commands. eg, `php bin/console.....` 
6. Run `bin/console d:d:c` short for `bin/console doctrine:database:create`
7. Run `bin/console d:s:u --force` short for `bin/console doctrine:schema:update --force`
8. Run `bin/console d:f:l` short for `bin/console doctrine:fixtures:load`

## Viewing the site

1. Run `php bin/console s:r` short for `bin/console server:run`
2. Run `yarn encore dev --watch`, this will build the scss and JS
3. Go to `127.0.0.1:8000` in your browser
4. DONE!