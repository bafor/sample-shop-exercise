# sample-shop-exercise

Spis treści:
- [Treść zadania](https://github.com/bafor/sample-shop-exercise/tree/dokumentacja#treść-zadania)
- [Moje uwagi do wykonania](https://github.com/bafor/sample-shop-exercise/tree/dokumentacja#moje-uwagi-do-wykonania)

## Treść zadania

1. Postaw nowy projekt z użyciem Symfony 3.* lub 4.*

2. Przygotuj (bardzo) prosty sklep, korzystając z Symfony i Doctrine jako
orm do bazy danych.

3. Wymagania funkcjonalne: (trzymaj się dokładnie tych wymagań)

1. Listowanie produktów od najnowszego
2. 10 produktów na stronie
3. Paginacja produktów
- Najlepiej wykorzystaj do tego gotowego bundle, zintegrowanego z
doctrine: https://github.com/KnpLabs/KnpPaginatorBundle
4. Możliwość zalogowania / wylogowania się ze strony
- Mozesz skorzystac z prostego logowania z dokumentacji (in memory
http://symfony.com/doc/current/book/security.html ) Nie musisz
zapisywac danych użytkownika w bazie danych
5. Dodawanie produktów
- dodawanie na specjalnej podstronie pod urlem /admin/new-product
do którego mają dostęp tylko zalogowani użytkownicy. Do dodawania, użyj
komponentu form z symfony
- tylko uzytkownicy zalogowani mogą dodać produkt
- Produkt powinien miec wymaganą nazwę, opis minimum 100 znaków
i cenę wraz z walutą zgodną z ustawionym locale projektu
6. Po dodaniu produktu aplikacja wyśle mail z notyfikacją pod adres
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


## Moje uwagi do wykonania

Jest to mimo wszystko dość abstrakcyjny problem, można było podejść do niego na różne sposoby, zakładam że oczekiwany był pewien "overengineering" by pokazać umiejętności. Można by to oczywiście rozszerzać dodając np inny storage dla Query itp. W paru miejscach jednak musiałem powiedzieć stop - założeniem było zamknięcie projektu w ~4h pracy.

> Paginacja produktów
> Najlepiej wykorzystaj do tego gotowego bundle, zintegrowanego z doctrine: https://github.com/KnpLabs/KnpPaginatorBundle

Zastosowanie KnpPaginatorBundle do mojego rozwiązania było takim średnim wyborem. Nie chciałem mieszać warstw Command i Query w projekcie co chociaż symbolicznie zaznaczając innym sposobem operowania na storeagu. Więc suma sumarum jako że bundle nie wspiera specjalnie dobrze niczego poza doctrinowym querym builderem to stronnicowanie budowane jest po stronie kodu - jest to niewydajne z drugiej strony to nie jest prawdziwy sklep

> 4. Możliwość zalogowania / wylogowania się ze strony

Użyłem basic auth, żeby nie bawić się specjanie. Dane do logowania jak w KPRM login: `admin`, hasłow `admin1`
Użycie basic autha trochę utrudnia, choć nie uniemożliwia wylogowywanie. Generalnie jeśli znajde chwilę to przerobiłbym ten fragment.

>  Produkt powinien miec wymaganą nazwę, opis minimum 100 znaków i cenę wraz z walutą zgodną z ustawionym locale projektu

Szczerze mówiać to nie zrozumiałem koncpecji stojącej z częścią polecenia dotyczaąca waluty. Bo to można rozumieć implementacje możliwości zmiany locale projektu a to troche by zwiększało jego rozmiar. Natomiast użycie jednej waluty na sztywno też niewiele wnosi. Czy tu chodziło o sprawdzenie pobierania ustawiec z configu? Nie wiem. Wiec zostałem przy wersji ze walute mozna wpisac poprzez odpowiedni symbol iso. 

Inne uwagi:
- nie skupiałem się na s konfiguracji środowiska, założyłem że to nie jest celem. Nie aplikuje na stanowisko devopsowe. Dorzuciłem jakiś standardowy developerski config dockera by móc sobie potestować rzeczy związane z bazą danych. Prosiłbym o nieczepianie się ;)
- przydałyby się jakieś fixtury, może później zostaną dodane.
