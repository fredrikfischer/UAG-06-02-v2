<?php

    date_default_timezone_set('Europe/Stockholm');
    
    include '../setAndGetActivity.inc.php';
    include '../home.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAG | Create Activity</title>

          <!-- api för kartan -->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.1/leaflet.js"></script>
    <!-- api geosearch (sökfunktionen) i kartan -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    
    <script defer src="..\js\share activity.js"></script>
    <link rel="stylesheet" href="../css/newstyle.css">

  
    
</head>
<body>

<div id="BG">
            <?php
            if (isset($_SESSION['uid'])===true){
                include '../headers/loggedin.php';
                } else{ 
                    include '../headers/notloggedin.php';
                }
        
            ?> 

        

        <div class='container' id='termsandconditionform'>
                <br>
            <div class='bighead'>
                <h2>Terms and conditions for Uppsala Activity Guide™</h2>
            </div>

            <h3>Introduction</h3>
            <p>These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Uppsala Activity Guide™ accessible at UppsalaActivityGuide.com.</p>

            <h3>Intellectual Property Rights</h3>
            <p>Other than the content you own, under these Terms, Uppsala Activity Guide™ and/or its licensors own all the intellectual property rights and materials contained in this Website.
            <br><br>
            You are granted limited license only for purposes of viewing the material contained on this Website.</p>
            

                <h3>Restrictions</h3>
                <p>You are specifically restricted from all of the following:</p>
          
                <p>• publishing any Website material in any other media;</p>
           
                <p>• selling, sublicensing and/or otherwise commercializing any Website material;</p>
            
                <p>• publicly performing and/or showing any Website material;</p>
            
                <p>• using this Website in any way that is or may be damaging to this Website;</p>
               
                <p>• using this Website in any way that impacts user access to this Website;</p>
         
                <p>• using this Website contrary to applicable laws and regulations, or in any way may cause harm to the Website, or to any person or business entity;</p>
                
                <p>• engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website;</p>
                
                <p>• using this Website to engage in any advertising or marketing.</p>
                <p>Certain areas of this Website are restricted from being access by you and Uppsala Activity Guide™ may further restrict access by you to any areas of this Website, at any time, in absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality as well.</p>
            
                   
                <h3>Your Content</h3>
                <p>In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video text, images or other material you choose to display on this Website. By displaying Your Content, you grant Uppsala Activity Guide™ a non-exclusive, worldwide irrevocable, sub licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.</p>
                    
                <p>Your Content must be your own and must not be invading any third-party's rights. Uppsala Activity Guide™ reserves the right to remove any of Your Content from this Website at any time without notice.</p>
                   
                <h3>No warranties</h3>
                <p>This Website is provided “as is,” with all faults, and Uppsala Activity Guide™ express no representations or warranties, of any kind related to this Website or the materials contained on this Website. Also, nothing contained on this Website shall be interpreted as advising you</p>

                <h3>Limitation of liability</h3>
                <p>In no event shall Uppsala Activity Guide™, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  Uppsala Activity Guide™, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>

                <h3>Indemnification</h3>
                <p>You hereby indemnify to the fullest extent Uppsala Activity Guide™ from and against any and/or all liabilities, costs, demands, causes of action, damages and expenses arising in any way related to your breach of any of the provisions of these Terms.</p>

                <h3>Severability</h3>
                <p>If any provision of these Terms is found to be invalid under any applicable law, such provisions shall be deleted without affecting the remaining provisions herein</p>

                <h3>Variation of Terms</h3>
                <p>Uppsala Activity Guide™ is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review these Terms on a regular basis.</p>

                <h3>Assignment</h3>
                <p>Uppsala Activity Guide™ is allowed to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification. However, you are not allowed to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.</p>
           
                <h3>Entire Agreement</h3>
                <p>These Terms constitute the entire agreement between Uppsala Activity Guide™ and you in relation to your use of this Website, and supersede all prior agreements and understandings.</p>
                
                <h3>Governing Law & Jurisdiction</h3>
                <p>These Terms will be governed by and interpreted in accordance with the laws of the State of Country, and you submit to the non-exclusive jurisdiction of the state and federal courts located in Country for the resolution of any disputes.</p>
            
            
                <div id="line"></div><br>
           

        </div>

        
        
        <div class="margin2"></div>
        
  
        


</div>
        

    </div>

