document.addEventListener('DOMContentLoaded', function () {
    var selectButtons = document.querySelectorAll('.BoxCharacter');
    var selectedChamps = { P1: null, P2: null };
    var currentPlayer = 'P1'; // Variable pour suivre le joueur actuel

    selectButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var champId = button.getAttribute('data-id');
            var champNom = button.getAttribute('data-nom');
            var champImg = button.querySelector('.BoxImg img').src;
            var playerNumber = currentPlayer === 'P1' ? '1' : '2'; // Utiliser currentPlayer pour déterminer le numéro du joueur

            toggleSelection(champId, champNom, champImg, button, playerNumber);

            // Vérifier si deux personnages sont sélectionnés pour afficher le bouton "ReadyButt"
            var selectedCount = Object.values(selectedChamps).filter(Boolean).length;
            document.getElementById('ReadyButt').style.display = (selectedCount === 2) ? 'flex' : 'none';

            // Alterner entre les joueurs après chaque sélection
            currentPlayer = currentPlayer === 'P1' ? 'P2' : 'P1';
        });
    });

    function toggleSelection(champId, champNom, champImg, button, playerNumber) {
        if (selectedChamps.P1 !== null && selectedChamps.P1.id === champId) {
            deselectChamp('P1');
        } else if (selectedChamps.P2 !== null && selectedChamps.P2.id === champId) {
            deselectChamp('P2');
        } else if (selectedChamps.P1 === null) {
            selectChamp('P1', champId, champNom, champImg, button, playerNumber);
        } else if (selectedChamps.P2 === null) {
            selectChamp('P2', champId, champNom, champImg, button, playerNumber);
        }
    }

    function selectChamp(playerId, champId, champNom, champImg, button, playerNumber) {
        selectedChamps[playerId] = { id: champId, nom: champNom, img: champImg, playerNumber: playerNumber };
        updateSelectedChamp(playerId, selectedChamps[playerId]);
        button.classList.add('selected', playerId);
        updatePlayerNumber(champId, playerNumber); // Mettre à jour le player number lors de la sélection du personnage
    }

    function deselectChamp(playerId, champId) {
        selectedChamps[playerId] = null;
        updateSelectedChamp(playerId, null);
        var selectedButton = document.querySelector('.BoxCharacter.selected.' + playerId);
        if (selectedButton) {
            selectedButton.classList.remove('selected', playerId);
        }
        
        // Envoyer une requête pour mettre à jour le player_number à 0 dans la base de données
        updatePlayerNumber(champId, 0);
    }
    

    function updateSelectedChamp(playerId, champ) {
        var playerDiv = document.getElementById(playerId);
        if (champ === null) {
            playerDiv.innerHTML = `<img src='img/None.png' alt=''><p></p>`;
        } else {
            playerDiv.innerHTML = `<img src='${champ.img}' alt=''><p>${champ.nom}</p>`;
        }
    }

    function updatePlayerNumber(champId, playerNumber) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_player_number.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send("champId=" + champId + "&playerNumber=" + playerNumber);
    }
});





