<html>

<head>
    <title>CODICE FISCALE</title>

    <script>
        function updateCF() {

            var cognome = document.getElementById("cognome").value;
            var nome = document.getElementById("nome").value;
            var giorno = document.getElementById("giorno").value;
            var mese = document.getElementById("mese").value;
            var anno = document.getElementById("anno").value;
            var sesso = document.getElementById("sesso").value;
            var comune = document.getElementById("comune").value;

            console.log("ciao" + cognome);


            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("out").innerHTML = this.responseText;
                }
            }

            xhttp.open("get", "result.php?" + `cognome=${cognome}&nome=${nome}&giorno=${giorno}&mese=${mese}&anno=${anno}&sesso=${sesso}&comune=${comune}`, true);
            xhttp.send();
        }
    </script>
</head>

<body>
    <h1> CALCOLO CODICE FISCALE </h1><br>
    <form>
        <div id="principale">
            <table width="50%">
                <tr>
                    <td>
                        <p>NOME:</p>
                    </td>
                    <td>
                        <input type="text" id="nome" onchange="updateCF()">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>COGNOME:</p>
                    </td>
                    <td>
                        <br>
                        <input type="text" id="cognome"onchange="updateCF()">
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>GIORNO:</p>
                    </td>
                    <td>
                        <br>
                        <select id="giorno"onchange="updateCF()">
                            <?php
                            for ($i = 1; $i < 32; $i++) {
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
                        <select id="mese"onchange="updateCF()">
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
                        <select id="anno"onchange="updateCF()">
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
                        <select id="sesso"onchange="updateCF()">
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
                        <select id="comune"onchange="updateCF()">
                            <option value="VICENZA">VICENZA</option>
                            <option value="BASSANO DEL GRAPPA">BASSANO</option>
                            <option value="VALDAGNO">VALDAGNO</option>
                            <option value="ARZIGNANO">ARZIGANO</option>
                        </select>
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