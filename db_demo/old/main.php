<html>
<head>
    <link rel = "stylesheet"
          type = "text/css"
          href = "design.css" />
   <script>
       function addEntry() {
           var name = document.getElementById('name').value;
           var entry = document.getElementById('entry').value;
           if(name != "" && entry != "")
           {
               var xhttp;
               xhttp = new XMLHttpRequest();
               xhttp.onreadystatechange = function  (){
                   if(this.readyState == 4 && this.status == 200)
                   {
                       document.getElementById('output').innerHTML = this.responseText;
                   }
               };
               var url = "addEntry.php?name="+name+"&entry="+entry;
               xhttp.open("GET",url,true);
               xhttp.send();
           }
           document.getElementById('name').value = '';
           document.getElementById('entry').value = '';
       }

       function deleteAll()
       {
           var xhttp;
           xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function () {
               if(this.readystatechange == 4 && this.status == 200)
               {
               }
           };
           var url = "deleteAll.php";
           xhttp.open("GET",url, true);
           xhttp.send();
           document.getElementById('output').innerHTML = "";
       }

       function showAll()
       {
           var xhttp;
           xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function () {
               document.getElementById('output').innerHTML = this.responseText;
           };
           var url = 'getContent.php';
           xhttp.open("GET",url,true);
           xhttp.send();
       }
   </script>
</head>
<body>
<table>
    <tr>
        <td>
            <div id="inputsection">
                <table class="inputtable">
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" autofocus id="name" name="name" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Entry</td>
                        <td><textarea name="entry" id="entry" rows="4" cols="20" value=""> </textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <button onclick="addEntry()" id="submitbutton" name="submitbutton">Send data</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button onclick="deleteAll()" id="delete" name="delete">Delete Entries</button>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <button onclick="showAll()" id="showAll" name="showAll">Show all entries</button>
                        </td>
                    </tr>
                </table>
            </div>

        </td>
        <td>
            <div id="output">

            </div>
        </td>
    </tr>
</table>
</body>
</html>
