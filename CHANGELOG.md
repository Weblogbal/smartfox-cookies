# Changelog

Toutes les modifications notables de ce projet seront documentées dans ce fichier.

## [1.0.4] - 2025-09-26

### Ajouté
- **Section d'informations de version** dans la page de réglages
- **Vérification automatique des mises à jour** depuis l'interface d'administration
- **Bouton "Vérifier les mises à jour"** pour forcer une vérification manuelle
- **Notifications visuelles** pour confirmer les actions (sauvegarde, vérification)
- **Liens directs** vers GitHub et Changelog depuis la page de réglages
- **Alerte visuelle** quand une mise à jour est disponible avec redirection vers les plugins

### Modifié
- **Description du plugin** plus professionnelle et attrayante
- **Interface de réglages** enrichie avec section d'informations en bas de page
- **Documentation `version.json`** avec descriptions enrichies et emojis
- **Système de gestion des formulaires** pour supporter les actions multiples

### Technique
- Amélioration de la méthode `after_install()` pour la structure plate
- Correction du slug du plugin dans la classe `UpdateChecker`
- Ajout de méthodes `get_plugin_version()` et `render_version_info()`
- Gestion des actions POST multiples dans `maybe_handle_form()`

## [1.0.3] - 2025-09-26

### Ajouté
- **Réorganisation complète** : Plugin principal déplacé à la racine du repository
- **Structure plate** pour simplifier les mises à jour automatiques
- **Système de debug** temporaire avec `?smartfox_debug=1`

### Modifié
- **Classe UpdateChecker** simplifiée pour la nouvelle structure
- **Méthode `after_install()`** optimisée pour l'installation directe
- **Documentation** mise à jour pour refléter la nouvelle structure

### Technique
- Suppression de la gestion complexe des sous-dossiers
- Correction des problèmes de slug dans les mises à jour
- Amélioration de la détection des dossiers de plugin

## [1.0.2] - 2025-09-26

### Ajouté
- **Tests du système de mise à jour** et corrections
- **Amélioration de la description** du plugin

### Corrigé
- **Problèmes de slug** dans la classe UpdateChecker
- **Gestion des erreurs** de téléchargement et d'installation

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