<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numérisation - Logiciel Mairie</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #003366;
            color: white;
            padding: 20px;
            text-align: center;
        }

        section {
            padding: 20px;
            margin: 20px;
            background-color: white;
            border-radius: 5px;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: #003366;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Numérisation de Documents</h1>
    </header>

    <section>
        <h2>Téléchargez votre document</h2>
        <input type="file" id="document" />
        <button onclick="uploadDocument()">Télécharger</button>
    </section>

    <footer>
        <p>&copy; 2025 Mairie - Tous droits réservés</p>
    </footer>

    <script>
        function uploadDocument() {
            const documentInput = document.getElementById('document');
            if (documentInput.files.length > 0) {
                const formData = new FormData();
                formData.append('document', documentInput.files[0]);

                fetch('/upload', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => alert(data))
                .catch(error => console.error('Erreur:', error));
            } else {
                alert('Veuillez sélectionner un document à télécharger.');
            }
        }
    </script>
</body>
</html>
