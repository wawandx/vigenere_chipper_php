# Criptography with Vigenere Chipper

## DEMO
https://criptography-vigenere.herokuapp.com/

## RUMUS
```
Encrypt: Ci = (Pi + Ki) mod 26

Decrypt: 
  * Pi = (Ci – Ki) mod 26; untuk Ci > = Ki
  * Pi = Pi = (Ci + 26 – Ki) mod 26; untuk Ci < = Ki 
```