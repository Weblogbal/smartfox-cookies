# Changelog

Toutes les modifications notables de ce projet seront documentées dans ce fichier.

## [1.0.1] - 2024-09-26

### Ajouté
- Système de mise à jour automatique depuis GitHub
- Classe `Smartfox_Update_Checker` pour gérer les mises à jour
- Configuration centralisée des paramètres de mise à jour
- Fichier `version.json` pour la gestion des versions
- Headers étendus dans le plugin principal
- Support pour les mises à jour via l'interface d'administration WordPress

### Modifié
- Amélioration de la gestion des constantes WPML
- Structure du projet organisée avec dossier `includes/`
- Documentation mise à jour

### Technique
- Système de cache pour les vérifications de mise à jour (12h)
- Intégration avec l'API WordPress pour les mises à jour
- Gestion des erreurs et fallbacks

## [1.0.0] - 2024-09-26

### Ajouté
- Version initiale du plugin
- Gestion du consentement aux cookies via GetTerms CMP
- Intégration Google Analytics GA4
- Support multilingue (Polylang et WPML)
- Interface d'administration simple
- Injection des scripts en haut du `<head>`
- Nettoyage automatique lors de la désinstallation
- Liens rapides vers les réglages depuis la liste des extensions

### Fonctionnalités
- Configuration par langue des codes cookies
- Configuration par langue des IDs Google Analytics GA4
- Interface utilisateur intuitive dans Réglages > Smartfox Cookies
- Protection par nonce pour la sécurité
- Échappement approprié des données pour la sécurité XSS