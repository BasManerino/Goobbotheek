WAMP installeren:

1. Ga naar: http://www.wampserver.com/en/#download-wrapper 
 
2. Zoek uit welke bits versie uw computer heeft en klik op een van de twee gele knoppen, afhankelijk van de bits versie. De bits versie ziet u bij Instellingen > Systeem > Info > Type systeem
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/2.png?raw=true)


3. Klik op download directly en daarna op de grote groene Download knop. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/1.png?raw=true)
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/4.png?raw=true)
 

4. Voer het gedownloade bestand uit. U zult een bericht zien dat vraagt of u dit programma wijzigen wilt laten maken aan uw computer, selecteer Ja.

![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/5.png?raw=true)

 
Klik vervolgens op Next zodat u door alle stappen heen kunt gaan. Accepteer de License Agreement, klik op Next, laat de installatie map voor wat het is zodat het in de C: map wordt geïnstalleerd, klik op Next, selecteer Create a Desktop icon en klik op Next. Laat het programma installeren en geef het toegang langs de firewall zodra/als dat word aangegeven. Klik weer op Next, laat de volgende opties voor wat ze zijn, klik op Next en klik dan op Finish.



 
Test Mail Server Tool

1. Ga naar http://www.toolheap.com/test-mail-server-tool/ en klik op Download Test Mail Server Tool. Zorg wel dat AdBlock uit staat voordat u de website opent, anders wordt de download link niet zichtbaar. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/6.png?raw=true)
 
2. Voer het gedownloade bestand uit en ga door alle stappen heen. 





Website implementeren

1. Download de website van GitHub via deze website (klik op Clone or download en selecteer Download ZIP: https://github.com/BasManerino/Goobbotheek

2. Pak het pakket uit in dezelfde map. 
3. Ga via Windows Verkenner naar de C: schijf, open de map wamp64 en open in die map www. 
5. In de www map, maak een nieuwe map aan genaamd 2017-2018. 
4. Zet de uitgepakte map in de 2017-2018 map. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/7.png?raw=true)



Website database importeren

1. Zet WAMP aan. Dit wordt gedaan door op de WAMP-snelkoppeling te klikken die op uw bureaublad staat en vervolgens het programma toestemming geven om wijzigingen te maken op de computer door op Ja. Zorg wel dat Skype uit staat voordat WAMP wordt aangezet, anders doet hij het niet. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/8.png?raw=true)
 
Het WAMP-icoontje zal rechts onderin verschijnen. Als het icoontje na een tijdje groen wordt, betekent dat dat het werkt.
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/9.png?raw=true)
 
2. Open de webbrowser naar keuze, typ in de adresbalk "localhost" en druk op enter.
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/10.png?raw=true)
 
3. Zoek naar de tekst “phpmyadmin” en klik er op.
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/11.png?raw=true)
 
4. Typ bij Gebruikersnaam in “root”, laat het Wachtwoord veld leeg en druk op Starten. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/12.png?raw=true)
 
Belangrijk: Wacht niet te lang met de volgende stappen. Als er een inactiviteit plaatsvind van 24 minuten terwijl phpmyadmin aan staat, zal u opnieuw moeten inloggen. 


5. Klik op Nieuw en maak een nieuwe database aan. Voer bij Databasenaam “apotheek” in en laat alle andere opties voor wat ze zijn. Klik op aanmaken. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/13.png?raw=true)
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/14.png?raw=true)
 
 






6. Klik links op apotheek om de database te selecteren en klik vervolgens op Importeren. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/15.png?raw=true)














7. Klik op Bestand kiezen en selecteer apotheek.sql (dit bestand zit inbegrepen in de GitHub map). Laat de andere opties voor wat ze zijn en klik vervolgens op Starten. 
De database word nu geïmporteerd, dit kan even duren.
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/16.png?raw=true)
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/24.png?raw=true)
 
 




Website online zetten

1. Installeer FileZilla versie 0.9.60.2. Haal het van een van deze links, afhankelijk van uw besturingssysteem (vink het vakje aan van de link die u heeft gekozen): 
https://filezilla-project.org/download.php?platform=win64 (Windows 64 bit) 
https://filezilla-project.org/download.php?platform=win32 (Windows 32 bit) 
https://filezilla-project.org/download.php?platform=osx (Mac OS)
https://filezilla-project.org/download.php?platform=linux (Linux)
2. Klik op Download FileZilla Client. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/17.png?raw=true)
 
3. Selecteer FileZilla (NIET FileZilla Pro) en klik op Download 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/18.png?raw=true)
 
4. Voer het gedownloade bestand uit en ga door de stappen heen om FileZilla te installeren. 
5. Start FileZilla op.
6. Als FileZilla is opgestart, klik op Bestand en dan op Sitebeheer. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/19.png?raw=true)
 
7. Klik op Nieuwe site en typ Goobbotheek in bij de nieuwe website in de Mijn sites lijst. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/25.png?raw=true)


8. Selecteer Goobbotheek in de Mijn sites lijst en voer de volgende gegevens in bij Algemeen: 
•	Host: 185.224.137.106
•	Poort: 21
•	Protocol: FTP – File Transfer Protocol
•	Versleuteling: Gebruik expliciete FTP via TLS indien beschikbaar
•	Inlogtype: Normaal
•	Gebruiker: u213695949
•	Wachtwoord: sRjxXqdxqy1Y

Klik vervolgens op Verbinden.

![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/20.png?raw=true)
 




9. Klik op OK. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/21.png?raw=true)
 
10. In FileZilla, open de map waar u de GitHub map heeft in het Lokale site vakje. Het pad en de map die u moet aanklikken is te zien op het plaatje hieronder. 
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/22.png?raw=true)
 




11. De map die u moest aanklikken bevat alle website bestanden. Selecteer alle bestanden die in de map en sleep ze naar de public_html map die aan de rechterkant van FileZilla staat.
![Alt text](https://github.com/BasManerino/Goobbotheek/blob/master-1/23.png?raw=true)
 















