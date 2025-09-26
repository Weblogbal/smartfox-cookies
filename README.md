# Smartfox Cookies

Extension WordPress pour la gestion du consentement aux cookies et l'intégration de Google Analytics GA4 avec support multilingue.

## Description

Smartfox Cookies permet d'injecter facilement les scripts de consentement aux cookies et Google Analytics GA4 dans le `<head>` de votre site WordPress. L'extension supporte la gestion multilingue via Polylang ou WPML.

## Fonctionnalités

- ✅ Gestion du consentement aux cookies via GetTerms CMP
- ✅ Intégration Google Analytics GA4
- ✅ Support multilingue (Polylang et WPML)
- ✅ Interface d'administration intuitive
- ✅ Mise à jour automatique depuis GitHub
- ✅ Injection sécurisée des scripts
- ✅ Nettoyage automatique lors de la désinstallation

## Installation

1. Téléchargez l'extension depuis GitHub ou installez-la via l'admin WordPress
2. Activez l'extension dans votre tableau de bord WordPress
3. Allez dans **Réglages > Smartfox Cookies**
4. Configurez vos codes cookies et IDs Google Analytics pour chaque langue

## Configuration

### Codes Cookies
Entrez vos codes d'embed GetTerms CMP pour chaque langue :
```
Format : aaaaa-bbbbb-ccccc-ddddd-eeeee/fr
```

### Google Analytics GA4
Entrez vos IDs de mesure GA4 pour chaque langue :
```
Format : G-XXXXXXXXXX
```

## Système de mise à jour

L'extension dispose d'un système de mise à jour automatique qui vérifie les nouvelles versions depuis ce repository GitHub.

### Comment ça fonctionne

1. **Vérification automatique** : L'extension vérifie toutes les 12 heures s'il y a une nouvelle version
2. **Notification** : Si une mise à jour est disponible, vous verrez une notification dans l'admin WordPress
3. **Mise à jour en un clic** : Cliquez sur "Mettre à jour" pour installer la dernière version
4. **Cache intelligent** : Les vérifications sont mises en cache pour optimiser les performances

### Fichiers de configuration

- `version.json` : Contient les informations de version et les métadonnées
- `CHANGELOG.md` : Historique des modifications
- `includes/update-config.php` : Configuration du système de mise à jour

### Mise à jour manuelle

Si vous préférez mettre à jour manuellement :

1. Téléchargez la dernière version depuis GitHub
2. Désactivez l'ancienne extension
3. Supprimez l'ancien dossier
4. Installez la nouvelle version
5. Réactivez l'extension

## Structure du projet

```
smartfox-cookies/
├── smartfox-cookies/
│   ├── smartfox-cookies.php      # Fichier principal
│   └── includes/
│       ├── class-update-checker.php  # Système de mise à jour
│       └── update-config.php          # Configuration
├── version.json                   # Informations de version
├── CHANGELOG.md                  # Historique des modifications
└── README.md                     # Documentation
```

## Pour les développeurs

### Publier une nouvelle version

1. Mettez à jour le numéro de version dans :
   - `smartfox-cookies.php` (header)
   - `version.json`
2. Ajoutez les modifications dans `CHANGELOG.md`
3. Commitez et poussez vers GitHub
4. Les utilisateurs recevront automatiquement la notification de mise à jour

### Configuration GitHub

Assurez-vous que :
- Le repository est public
- Le fichier `version.json` est à la racine
- Les releases suivent le versioning sémantique

## Support

- **Issues** : [GitHub Issues](https://github.com/Weblogbal/smartfox-cookies/issues)
- **Documentation** : [GitHub Repository](https://github.com/Weblogbal/smartfox-cookies)

## Auteur

**Fabrice Simonet | Webglobal**
- Site web : [webglobal.fr](https://webglobal.fr)
- GitHub : [@Weblogbal](https://github.com/Weblogbal)

## Licence

GPL v2 ou ultérieure

## Changelog

Voir [CHANGELOG.md](CHANGELOG.md) pour l'historique complet des modifications.
