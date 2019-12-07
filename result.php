<?php

function CalcolaCodice($cognome, $nome, $giorno, $mese, $anno, $sesso, $comune)
{
    $risultato = "";

    $cognomeC = CalcolaCognome($cognome);
    $risultato .= $cognomeC;


    $nomeC = CalcolaNome($nome);
    $risultato .= $nomeC;


    $risData = CalcolaData($giorno, $mese, $anno, $sesso);
    $risultato .= $risData;

    $comuneC = Catastali($comune);
    $risultato .= $comuneC;
    $carattere = CalcolaCarattere($risultato);
    $risultato .= $carattere;


    return "Il tuo codice fiscale è: $risultato";
}
function CalcolaCarattere($ris)
{

    $i = 0;
    $pari = "";
    $dispari = "";

    for ($i = 0; $i < 15; $i++) {
        $let = $ris{
            $i};
        if ($i % 2 != 0) {
            $pari .= $let;
        } else {
            $dispari .= $let;
        }
    }

    $numPari = CalcolaPari($pari);
    $numDispari = CalcolaDispari($dispari);

    $resto = ($numDispari + $numPari) % 26;
    $finale = CalcolaResto($resto);
    return $finale;
}
function CalcolaResto($resto)
{
    $res = [
        "0" => "A",
        "1" => "B",
        "2" => "C",
        "3" => "D",
        "4" => "E",
        "5" => "F",
        "6" => "G",
        "7" => "H",
        "8" => "I",
        "9" => "J",
        "10" => "K",
        "11" => "L",
        "12" => "M",
        "13" => "N",
        "14" => "O",
        "15" => "P",
        "16" => "Q",
        "17" => "R",
        "18" => "S",
        "19" => "T",
        "20" => "U",
        "21" => "V",
        "22" => "W",
        "23" => "X",
        "24" => "Y",
        "25" => "Z"
    ];

    $a = $res[$resto];
    return $a;
}
function CalcolaPari($pari)
{
    $con = [

        "0" => 0,
        "1" => 1,
        "2" => 2,
        "3" => 3,
        "4" => 4,
        "5" => 5,
        "6" => 6,
        "7" => 7,
        "8" => 8,
        "9" => 9,
        "A" => 0,
        "B" => 1,
        "C" => 2,
        "D" => 3,
        "E" => 4,
        "F" => 5,
        "G" => 6,
        "H" => 7,
        "I" => 8,
        "J" => 9,
        "K" => 10,
        "L" => 11,
        "M" => 12,
        "N" => 13,
        "O" => 14,
        "P" => 15,
        "Q" => 16,
        "R" => 17,
        "S" => 18,
        "T" => 19,
        "U" => 20,
        "V" => 21,
        "W" => 22,
        "X" => 23,
        "Y" => 24,
        "Z" => 25
    ];

    $i = 0;
    $pariN = 0;

    for ($i = 0; $i < strlen($pari); $i++) {
        $pariN += $con[$pari{
            $i}];
    }

    return $pariN;
}
function CalcolaDispari($dispari)
{
    $con = [

        "0" => 1,
        "1" => 0,
        "2" => 5,
        "3" => 7,
        "4" => 9,
        "5" => 13,
        "6" => 15,
        "7" => 17,
        "8" => 19,
        "9" => 21,
        "A" => 1,
        "B" => 0,
        "C" => 5,
        "D" => 7,
        "E" => 9,
        "F" => 13,
        "G" => 15,
        "H" => 17,
        "I" => 19,
        "J" => 21,
        "K" => 2,
        "L" => 4,
        "M" => 18,
        "N" => 20,
        "O" => 11,
        "P" => 3,
        "Q" => 6,
        "R" => 8,
        "S" => 12,
        "T" => 14,
        "U" => 16,
        "V" => 10,
        "W" => 22,
        "X" => 25,
        "Y" => 24,
        "Z" => 23
    ];

    $i = 0;
    $dispariN = 0;

    for ($i = 0; $i < strlen($dispari); $i++) {
        $dispariN += $con[$dispari{
            $i}];
    }

    return $dispariN;
}
function CalcolaData($gio, $mes, $ann, $s)
{

    $risData = "";
    $risData .= $ann{
        2};
    $risData .= $ann{
        3};

    $risData .= CalcolaMese($mes);

    $giorno = "";


    if ($s == "M") {
        if ($gio < 10) {
            $giorno = "0" . strval($gio);
        } else {
            $giorno = $gio;
        }
    } else {
        $giorno = intval($gio) + 40;
    }

    $risData .= $giorno;

    return $risData;
}
function CalcolaMese($mes)
{
    $mesi = [
        "01" => "A",
        "02" => "B",
        "03" => "C",
        "04" => "D",
        "05" => "E",
        "06" => "H",
        "07" => "L",
        "08" => "M",
        "09" => "P",
        "10" => "R",
        "11" => "S",
        "12" => "T"
    ];

    $a = $mesi[$mes];

    return $a;
}
function Catastali($n)
{
    $comune = [
        'VICENZA' => "L840",
        'BASSANO DEL GRAPPA' => "A703",
        'VALDAGNO' => "L551",
        'ARZIGNANO' => "A459"
    ];

    $cumRis = $comune[$n];

    return $cumRis;
}
function CalcolaCognome($cognome)
{

    $cognome = strtoupper($cognome);
    $cognome = str_replace(' ', '', $cognome);
    $ris = "";
    $tot = 0;
    for ($i = 0; ($i < strlen($cognome)) && ($tot < 3); $i++) {

        $lettera = $cognome{
            $i};
        if (!Vocale($lettera)) {
            if ($lettera != $cognome{
                $i - 1}) {
                $ris .= $lettera;
                $tot += 1;
            }
        }
    }

    if (strlen($ris) < 3) {
        for ($i = 0; ($i < strlen($cognome)) && ($tot < 3); $i++) {
            $lettera = $cognome{
                $i};

            if (Vocale($lettera)) {
                $ris .= $lettera;
                $tot += 1;
            }
        }
    } else {
        return $ris;
    }
    for (; strlen($ris) < 3;) {
        $ris .= "X";
        $tot++;
    }
    return $ris;
}
function CalcolaNome($nome)
{

    $nome = strtoupper($nome);
    $nome = str_replace(' ', '', $nome);

    $ris = "";

    $ris1 = "";
    $tot1 = 0;

    for ($i = 0; $i < strlen($nome); $i++) {

        $lettera = $nome{
            $i};
        if (!Vocale($lettera)) {
            $ris1 .= $lettera;
            $tot1++;
        }
    }

    if ($tot1 > 3) {
        $ris = PiuConsonanti($ris1);
        return $ris;
    } else if ($tot1 == 3) {
        $ris = $ris1;
        return $ris;
    }

    $ris = $ris1;
    $tot = $tot1;

    if (strlen($ris) < 3) {
        for ($i = 0; $i < strlen($nome) && ($tot < 3); $i++) {
            $lettera = $nome{
                $i};

            if (Vocale($lettera)) {
                $ris .= $lettera;
                $tot++;
            }
        }
    } else {
        return $ris;
    }
    for (; strlen($ris) < 3;) {
        $ris .= "X";
        $tot++;
    }
    return $ris;
}
function PiuConsonanti($cons)
{
    $ris = "";
    $ris = $cons{
        0} . $cons{
        2} . $cons{
        3};
    return $ris;
}
function Vocale($let)
{
    if (($let == "A") || ($let == "E") || ($let == "I") || ($let == "O") || ($let == "U")) {
        return true;
    } else {
        return false;
    }
}


$d = $_REQUEST;
$cod = CalcolaCodice($d["cognome"], $d["nome"], $d["giorno"], $d["mese"], $d["anno"], $d["sesso"], $d["comune"]);

echo $cod;
?>