<!DOCTYPE html>
<html lang="it" >
<head>
<script>
  //=========> Script in Java script per realizzare l'effetto di Scrittura Automativa ( Come chat GPT )
var testo = "CodeGen sfrutta l'intelligenza artificiale per generare codici di qualsiasi linguaggio di programmazione separando e rendendo riconoscibili i costrutti, scegli il linguaggio di programmazione desiderato";
var velocitaScrittura = 50;
var lunghezzaBlocco = 50;
function scriviTesto(testo, velocitaScrittura) {
  var blocchi = [];
  for (var i = 0; i < testo.length; i += lunghezzaBlocco) {
    blocchi.push(testo.substr(i, lunghezzaBlocco));
  }
  var indexBlocco = 0;
  var indexCarattere = 0;
  var interval = setInterval(function() {
    var carattere = blocchi[indexBlocco].charAt(indexCarattere);
    document.getElementById('testo').innerHTML += carattere;
    indexCarattere++;
    if (indexCarattere >= blocchi[indexBlocco].length) {
      indexBlocco++;
      indexCarattere = 0;
      document.getElementById('testo').innerHTML += " ";
    }
    if (indexBlocco >= blocchi.length) {
      clearInterval(interval);
    }
  }, velocitaScrittura);
}
setTimeout(function() {
  scriviTesto(testo, velocitaScrittura);
}, 1000);
</script>
  <meta charset="UTF-8">
  <title>CodeGen - JavaScript</title>
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>

          body {
            background-color: #222;
            color: #0ff;
            font-family: 'Courier New', monospace;
          }

          .sidebar, .info-panel {
            height: 100vh;
            position: fixed;
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            padding: 20px;
          }

          .sidebar {
            width: 200px;
          }

          .content {
            margin-left: 200px;
          }

          .rounded-circle {
            width: 200px;
            height: 200px;
          }

          .info-panel {
            right: 0;
           
          }
          .resizable {
        resize: both;
    }
          .nav-link {
            color: #0ff;
            text-decoration: none;
            border-bottom: 1px solid rgba(0, 255, 255, 0.2);
            padding: 5px 0;
            transition: all 0.3s ease;
          }
          .nav-link:hover {
            color: #00ffff;
            background-color: rgba(0, 255, 255, 0.1);
          }
        </style>
</head>
<body>
<div class="container-fluid">
      <div class="row">
        <header class="col-12">
          
        </header>
       
        <div class="col-8 content">
          <div class=" mt-4">
        
          <div class=" text-center mt-4">   
    <h1>Quasiasi cosa mi scrivi o mi chiedi io lo convertiro in codice <strong>JavaScript</strong></h1>
    <br>
     </div>
    
      <form method="GET">
  
          <div class="row mt-0">
  
          <div class="col-9 mx-auto">              
              <div class="input-group">
              <input type="text" class="form-control resizable" id="prompt" name="prompt" placeholder="Chiedimi qualcosa..." required="">

  
          </div>
   
          </div>
         
              
         </div>
    </form>
          </div>
        </div>
        
        
          <div>
            
          </div>
        </div>
      </div>
    </div>



<?php
    // Verifica se è stato inviato un form
    if (isset($_GET['prompt'])) {
    
     
     
     
        // Configurazione API OpenAI
        $prompt_value = $_GET['prompt'];
          $openai_api_key = ''; //  ===============> Chiave api di openai
        $openai_model = 'text-davinci-003'; // Modello di linguaggio di default
    
        // Prepara i dati per la richiesta API
        // ==== Condizioni Prompt ======
        
    
        // ==== Condizioni Prompt ======
        $comandosolocodice = "mi fai uno script ";
        $prompt = $comandosolocodice .$_GET['prompt'] . "in JavaScript";
        $temperature = 0;
        $max_tokens = 2048;
        $top_p = 1;
        $n = 1;
        $presence_penalty = 0;
        $frequency_penalty = 0;
        $stop = null;
        $data = array(
            'prompt' => $prompt,
            'temperature' => $temperature,
            'max_tokens' => $max_tokens,
            'top_p' => $top_p,
            'n' => $n,
            'stop' => $stop,
            'presence_penalty' => $presence_penalty,
            'frequency_penalty' => $frequency_penalty
        );
        $data_string = json_encode($data);
    
        // Invia la richiesta API a OpenAI
    
        $api_url = 'https://api.openai.com/v1/engines/' . $openai_model . '/completions';
        $ch = curl_init($api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $openai_api_key
        ));
        $response = curl_exec($ch);
        curl_close($ch);
    
        // Elabora la risposta di OpenAI
        $response_decoded = json_decode($response, true);
        $choices = $response_decoded['choices'];
        $text = $choices[0]['text'];

        echo "<div id='code_wrap'>";
        echo "<pre><code class='javascript'>";
        echo $text;
        echo"</code></pre>";
        echo "</div>";

       // echo "<h3 class='text-center'>RAW</h3>";
        //echo "<center><textarea rows='10' cols='30' style='width: 1017px; height: 600px;'>$text</textarea></center>";

} 

    
        
        
    
    
    
        
    
    ?>


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/highlight.min.js'></script><script  src="./script.js"></script>

</body>
</html>
