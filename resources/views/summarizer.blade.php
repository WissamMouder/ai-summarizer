<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Text Summarizer</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:linear-gradient(135deg,#2563eb,#7c3aed);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:30px;
        }

        .container{

            width:750px;
            max-width:100%;

            background:white;

            border-radius:20px;

            padding:35px;

            box-shadow:0 20px 40px rgba(0,0,0,.2);

        }

        h1{

            text-align:center;

            color:#2563eb;

            margin-bottom:25px;

        }

        textarea{

            width:100%;

            height:220px;

            padding:15px;

            border:1px solid #ddd;

            border-radius:12px;

            resize:none;

            font-size:16px;

            outline:none;

        }

        textarea:focus{

            border-color:#2563eb;

        }
        <div class="upload-area">

    <label for="pdfFile" class="upload-btn">

        📄 Upload PDF

    </label>

    <input
        type="file"
        id="pdfFile"
        accept=".pdf"
        hidden>

    <span id="fileName">
        No PDF selected
    </span>

</div>
        .info{

            display:flex;

            justify-content:space-between;

            margin-top:10px;

            color:#666;

            font-size:14px;

        }

        button{

            width:100%;

            margin-top:20px;

            padding:15px;

            border:none;

            border-radius:12px;

            background:#2563eb;

            color:white;

            font-size:18px;

            font-weight:bold;

            cursor:pointer;

            transition:.3s;

        }

        button:hover{

            background:#1d4ed8;

            transform:translateY(-2px);

        }

        button:disabled{

            background:gray;

            cursor:not-allowed;

        }

        #loading{

            display:none;

            margin-top:20px;

            text-align:center;

            color:#2563eb;

            font-weight:bold;

        }

        .spinner{

            width:35px;

            height:35px;

            border:4px solid #ddd;

            border-top:4px solid #2563eb;

            border-radius:50%;

            margin:10px auto;

            animation:spin 1s linear infinite;

        }
        .navbar{

    position:fixed;

    top:0;

    left:0;

    width:100%;

    background:white;

    padding:18px 40px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    box-shadow:0 3px 15px rgba(0,0,0,.15);

    z-index:999;

}

.logo{

    font-size:24px;

    font-weight:bold;

    color:#2563eb;

}

.right{

    display:flex;

    align-items:center;

    gap:20px;

}

.username{

    color:#444;

    font-weight:600;

}

.logout{

    background:#ef4444;

    color:white;

    border:none;

    padding:10px 18px;

    border-radius:8px;

    cursor:pointer;

    transition:.3s;

    font-size:15px;

}

.logout:hover{

    background:#dc2626;

}

.container{

    margin-top:90px;
}

        @keyframes spin{

            100%{

                transform:rotate(360deg);

            }

        }

        #summary{

            margin-top:25px;

            background:#eef4ff;

            border-left:5px solid #2563eb;

            border-radius:10px;

            padding:20px;

            min-height:120px;

            line-height:1.8;

            color:#333;

        }
        .upload-area{

    margin-bottom:20px;

    display:flex;

    align-items:center;

    gap:15px;

}

.upload-btn{

    background:#10b981;

    color:white;

    padding:12px 22px;

    border-radius:10px;

    cursor:pointer;

    transition:.3s;

    font-weight:bold;

}

.upload-btn:hover{

    background:#059669;

}

#fileName{

    color:#555;

    font-size:14px;

}
        .copy{

            margin-top:15px;

            text-align:right;

        }

        .copy button{

            width:auto;

            padding:10px 20px;

            font-size:15px;

        }

        @media(max-width:768px){

            .container{

                padding:25px;

            }

            h1{

                font-size:26px;

            }

        }

    </style>

</head>

<body>
    <div class="navbar">

    <div class="logo">
        🤖 AI Summarizer
    </div>

    <div class="right">

        <span class="username">
            👤 {{ Auth::user()->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="logout">
                Logout
            </button>

        </form>

    </div>

</div>

<div class="container">

    <h1>🤖 AI Text Summarizer</h1>

    <textarea
        id="text"
        placeholder="Paste your text here..."></textarea>

    <div class="info">

        <span>Enter your text</span>

        <span>
            Characters :
            <span id="count">0</span>
        </span>

    </div>

    <button
        id="btn"
        onclick="summarize()">

        ✨ Summarize

    </button>

    <div id="loading">

        <div class="spinner"></div>

        <p>Generating summary...</p>

    </div>

    <h3 style="margin-top:25px;">Summary</h3>

    <div id="summary">

        Your summary will appear here...

    </div>

    <div class="copy">

        <button onclick="copySummary()">

            📋 Copy Summary

        </button>

    </div>

</div>

<script>

const textarea=document.getElementById("text");

textarea.addEventListener("input",function(){

    document.getElementById("count").innerHTML=this.value.length;

});

async function summarize(){

    let text=document.getElementById("text").value;

    if(text.trim()==""){

        alert("Please enter some text.");

        return;

    }

    document.getElementById("loading").style.display="block";

    document.getElementById("btn").disabled=true;

    document.getElementById("summary").innerHTML="";

    try{

        let response=await fetch('/api/summarize',{

            method:'POST',

            headers:{

                'Content-Type':'application/json',

                'Accept':'application/json'

            },

            body:JSON.stringify({

                text:text

            })

        });

        let data=await response.json();

        if(response.ok){

            document.getElementById("summary").innerHTML=data.summary;

        }

        else{

            document.getElementById("summary").innerHTML=data.error || "An error occurred.";

        }

    }

    catch(error){

        document.getElementById("summary").innerHTML="Unable to connect to the server.";

    }

    document.getElementById("loading").style.display="none";

    document.getElementById("btn").disabled=false;

}

function copySummary(){

    let summary=document.getElementById("summary").innerText;

    navigator.clipboard.writeText(summary);

    alert("Summary copied successfully!");

}

</script>

</body>
</html>