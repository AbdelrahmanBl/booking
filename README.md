# Installation
First you must install docker depending on your system from [Docker Documentation](https://docs.docker.com/engine/install/)
Then run
```
./vendor/bin/sail up -d
./vendor/bin/sail composer install
./vendor/bin/sail npm install
./vendor/bin/sail migrate --seed
./vendor/bin/sail npm run dev
```
Then go to
```
http://localhost
```
Total time is: 12 hrs
- Frontend structure 5 hrs
- Create database migration 30 mins
- Setup frontend helpers 1 hr
- Admin can login and logout 30 min
- Setup frontend authentication guard 1 hr
- Admin can manage employees 1 hr
- Admin can manage rooms 30 min
- Admin can manage clients 15 min
- Admin can manage bookings 30 min
- Client can show main page & room page 1 hr
- Client can [login - logout] 15 min
- Client can register 10 min
- Client can [create - show] bookings 30 min
- Only admins can manage [Client - Employee] 10 min
- Prevent frontend guard for accessing invalid authed route 10 min

