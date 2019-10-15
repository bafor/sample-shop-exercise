# sample-shop-exercise

1. Postaw nowy projekt z użyciem Symfony 3.* lub 4.*

2. Przygotuj (bardzo) prosty sklep, korzystając z Symfony i Doctrine jako
orm do bazy danych.

3. Wymagania funkcjonalne: (trzymaj się dokładnie tych wymagań)

1. Listowanie produktów od najnowszego
1. 10 produktów na stronie
2. Paginacja produktów
- Najlepiej wykorzystaj do tego gotowego bundle, zintegrowanego z
doctrine: https://github.com/KnpLabs/KnpPaginatorBundle
2. Możliwość zalogowania / wylogowania się ze strony
- Mozesz skorzystac z prostego logowania z dokumentacji (in memory
http://symfony.com/doc/current/book/security.html ) Nie musisz
zapisywac danych użytkownika w bazie danych
3. Dodawanie produktów
- dodawanie na specjalnej podstronie pod urlem /admin/new-product
do którego mają dostęp tylko zalogowani użytkownicy. Do dodawania, użyj
komponentu form z symfony
- tylko uzytkownicy zalogowani mogą dodać produkt
- Produkt powinien miec wymaganą nazwę, opis minimum 100 znaków
i cenę wraz z walutą zgodną z ustawionym locale projektu
4. Po dodaniu produktu aplikacja wyśle mail z notyfikacją pod adres
fake@example.com (ten mail fizycznie nie musi wychodzić, użyj ustawień
dla środowiska dev:
http://symfony.com/doc/current/email/dev_environment.html)

4. Super jeśli:

- Gdzieś w swoim rozwiązaniu użyjesz podejścia Command Query
Separation np. możesz wykorzystać to przy tworzeniu i listowaniu
produktów
- Napiszesz przynajmniej 1 test do najważniejszej wg. Ciebie części
projektu
- Rozwiązanie przygotujesz w postaci otwartego repozytorium na githubie
