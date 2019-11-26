<html>

<head>
    <title>CODICE FISCALE</title>
</head>

<body>
    <h1> CALCOLO CODICE FISCALE </h1><br>
    <form action="result.php" method="POST">
        <div id="principale">
            <table width="50%">
                <tr>
                    <td>
                        <p>NOME:</p>
                    </td>
                    <td>
                        <input type="text" name="nome">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>COGNOME:</p>
                    </td>
                    <td>
                        <br>
                        <input type="text" name="cognome">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>GIORNO:</p>
                    </td>
                    <td>
                        <br>
                        <select name="giorno">
                            <?php
                            for ($i = 0; $i < 32; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>MESE:</p>
                    </td>
                    <td>
                        <br>
                        <select name="mese">
                            <option value="01">GENNAIO</option>
                            <option value="02">FEBBRAIO</option>
                            <option value="03">MARZO</option>
                            <option value="04">APRILE</option>
                            <option value="05">MAGGIO</option>
                            <option value="06">GIUGNO</option>
                            <option value="07">LUGLIO</option>
                            <option value="08">AGOSTO</option>
                            <option value="09">SETTEMBRE</option>
                            <option value="10">OTTOBRE</option>
                            <option value="11">NOVEMBRE</option>
                            <option value="12">DICEMBRE</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>ANNO:</p>
                    </td>
                    <td>
                        <br>
                        <select name="anno">
                            <?php
                            for ($i = 1900; $i < 2020; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>SESSO:</p>
                    </td>
                    <td>
                        <br>
                        <select name="sesso">
                            <option value="M">MASCHIO</option>
                            <option value="F">FEMMINA</option>
                            <option value="C">ALTRO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>COMUNE:</p>
                    </td>
                    <td>
                        <br>
                        <select name="comune">
                            <option value="VICENZA">VICENZA</option>
                            <option value="BASSANO DEL GRAPPA">BASSANO</option>
                            <option value="VALDAGNO">VALDAGNO</option>
                            <option value="ARZIGNANO">ARZIGANO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">CALCOLA</button>
                    </td>
                </tr>
            </table>
            <div id=" risult">
                <p id="out"></p>
            </div>
        </div>
    </form>
</body>

</html>