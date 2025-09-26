# Smartfox Cookies

🍪 **Extension WordPress professionnelle** pour la gestion intelligente du consentement aux cookies et l'intégration de Google Analytics GA4 avec support multilingue complet.

## 📋 Description

**Smartfox Cookies** simplifie la mise en conformité RGPD de votre site WordPress en gérant automatiquement :
- Le **consentement aux cookies** via GetTerms CMP
- L'**intégration Google Analytics GA4** 
- Le **support multilingue** (Polylang/WPML)
- Les **mises à jour automatiques** depuis GitHub

L'extension injecte intelligemment les scripts dans le `<head>` de votre site avec une interface d'administration intuitive.

## ✨ Fonctionnalités

### 🍪 **Gestion des cookies**
- ✅ Intégration **GetTerms CMP** pour le consentement
- ✅ **Configuration par langue** (multilingue)
- ✅ **Injection automatique** dans le `<head>`
- ✅ **Conformité RGPD** garantie

### 📊 **Analytics**
- ✅ **Google Analytics GA4** intégré
- ✅ **Configuration par langue**
- ✅ **Scripts optimisés** et conformes

### 🌐 **Multilingue**
- ✅ **Support Polylang** natif
- ✅ **Support WPML** natif  
- ✅ **Détection automatique** de la langue
- ✅ **Configuration séparée** par langue

### 🔄 **Mises à jour**
- ✅ **Système automatique** depuis GitHub
- ✅ **Notifications WordPress** intégrées
- ✅ **Vérification manuelle** disponible
- ✅ **Interface de gestion** dans les réglages
- ✅ **Cache intelligent** (12h)

### 🎨 **Interface**
- ✅ **Page de réglages** intuitive
- ✅ **Informations de version** en temps réel
- ✅ **Alertes de mise à jour** visuelles
- ✅ **Liens directs** vers GitHub/Changelog
- ✅ **Nettoyage automatique** à la désinstallation

## 🚀 Installation

### Installation automatique (recommandée)
1. **Téléchargez** l'extension depuis GitHub
2. **Activez** l'extension dans votre tableau de bord WordPress  
3. **Allez** dans **Réglages > Smartfox Cookies**
4. **Configurez** vos codes cookies et IDs Google Analytics
5. **Vérifiez** les informations de version en bas de page

### Installation manuelle
1. **Clonez** ou téléchargez ce repository
2. **Placez** le dossier dans `/wp-content/plugins/`  
3. **Activez** depuis l'admin WordPress
4. **Configurez** dans les réglages

## ⚙️ Configuration

### 🍪 **Codes Cookies (GetTerms CMP)**
```
Format requis : aaaaa-bbbbb-ccccc-ddddd-eeeee/fr
Exemple : 12345-67890-abcde-fghij-klmno/fr
```

**Par langue :**
- **Français** : `votre-code/fr`
- **Anglais** : `votre-code/en` 
- **Allemand** : `votre-code/de`

### 📊 **Google Analytics GA4**
```
Format requis : G-XXXXXXXXXX
Exemple : G-ABC123DEF4
```

**Configuration par langue :**
- Chaque langue peut avoir son **propre ID GA4**
- **Détection automatique** de la langue active
- **Injection optimisée** des scripts

## 🔄 Système de mise à jour avancé

### 📡 **Fonctionnement automatique**
1. **Vérification** toutes les 12 heures
2. **Notification** dans l'admin WordPress
3. **Mise à jour** en un clic depuis la page des plugins
4. **Cache intelligent** pour les performances

### 🎛️ **Gestion depuis les réglages**  
- **Version actuelle** affichée en permanence
- **Détection temps réel** des mises à jour
- **Bouton "Vérifier les mises à jour"** manuel
- **Alerte visuelle** + redirection vers plugins
- **Liens directs** GitHub et Changelog

### 🛠️ **Pour les développeurs**
- **Mode debug** : `?smartfox_debug=1` dans l'admin
- **Informations techniques** complètes
- **Diagnostic des erreurs** de connexion
- **Cache management** intégré

### 📁 **Fichiers de configuration**

- **`version.json`** : Métadonnées et informations de version pour GitHub
- **`CHANGELOG.md`** : Historique détaillé des modifications
- **`includes/update-config.php`** : Configuration centralisée du système de mise à jour
- **`includes/class-update-checker.php`** : Classe principale de gestion des mises à jour

### 🔧 **Dépannage**

**Mise à jour non détectée :**
1. **Désactiver/Réactiver** l'extension
2. **Mode debug** : `?smartfox_debug=1` dans l'admin  
3. **Vider le cache** WordPress
4. **Vérifier** que le repository est public

**Scripts non injectés :**
1. **Vérifier** les codes cookies/GA4 dans les réglages
2. **Contrôler** la détection de langue
3. **Désactiver** le cache si activé
4. **Consulter** les logs d'erreur PHP

## 📁 Structure du projet (nouveau)

```
smartfox-cookies/                    # Repository GitHub
├── smartfox-cookies.php            # ← Fichier principal à la racine
├── includes/                       
│   ├── class-update-checker.php    # ← Système de mise à jour
│   └── update-config.php           # ← Configuration centralisée
├── version.json                     # ← Métadonnées GitHub
├── CHANGELOG.md                     # ← Historique des versions  
├── DEPLOYMENT.md                    # ← Guide de déploiement
├── README.md                        # ← Documentation
└── .gitignore                       # ← Exclusions Git
```

## 👨‍💻 Pour les développeurs

### 🚀 **Publier une nouvelle version**

1. **Mise à jour des versions** :
   ```php
   // smartfox-cookies.php (ligne 5)
   Version: 1.0.5
   ```
   ```json
   // version.json  
   "version": "1.0.5",
   "last_updated": "2025-09-26"
   ```

2. **Changelog** :
   ```markdown
   // CHANGELOG.md
   ## [1.0.5] - 2025-09-26
   ### Ajouté
   - Nouvelle fonctionnalité...
   ```

3. **Publication** :
   ```bash
   git add .
   git commit -m "Version 1.0.5 - Description"
   git push origin main
   ```

4. **Vérification** : Les utilisateurs recevront la notification automatiquement

### ⚙️ **Configuration technique**

**Prérequis :**
- Repository GitHub **public**
- Fichier `version.json` à la **racine**
- Structure **plate** (fichiers à la racine)
- **Versioning sémantique** (x.y.z)

**URLs importantes :**
- **Version JSON** : `https://raw.githubusercontent.com/Weblogbal/smartfox-cookies/main/version.json`
- **Download ZIP** : `https://github.com/Weblogbal/smartfox-cookies/archive/refs/heads/main.zip`

### 🔍 **Debug & Tests**

```bash
# Mode debug dans WordPress admin
?smartfox_debug=1

# Forcer la vérification
Désactiver/Réactiver le plugin

# Vider le cache WordPress
delete_site_transient('update_plugins');
```

## 🆘 Support & Contribution

### 📞 **Obtenir de l'aide**
- **🐛 Issues** : [GitHub Issues](https://github.com/Weblogbal/smartfox-cookies/issues)
- **📚 Documentation** : [Repository GitHub](https://github.com/Weblogbal/smartfox-cookies)
- **📋 Changelog** : [CHANGELOG.md](CHANGELOG.md)

### 🤝 **Contribuer**
1. **Fork** le repository
2. **Créez** une branche feature
3. **Committez** vos modifications
4. **Ouvrez** une Pull Request

## 👤 Auteur

**Fabrice Simonet | Webglobal**
- 🌐 **Site web** : [web-global.ch](https://web-global.ch)
- 💼 **GitHub** : [@Weblogbal](https://github.com/Weblogbal)
- 🏢 **Entreprise** : Webglobal - Solutions digitales

## 📄 Licence

**GPL v2 ou ultérieure** - Voir le fichier [LICENSE](LICENSE) pour plus de détails.

## 📈 Changelog & Versions

**Version actuelle :** `1.0.4` (2025-09-26)

**Dernières améliorations :**
- 🎯 Interface de gestion des mises à jour dans les réglages
- 🔄 Vérification manuelle des mises à jour
- 📊 Affichage des informations de version
- 🎨 Description du plugin améliorée

➡️ **Voir [CHANGELOG.md](CHANGELOG.md)** pour l'historique complet des modifications.

---

<div align="center">

**🍪 Smartfox Cookies - Simplifiez votre conformité RGPD !**

[![GitHub](https://img.shields.io/badge/GitHub-Repository-blue?logo=github)](https://github.com/Weblogbal/smartfox-cookies)
[![WordPress](https://img.shields.io/badge/WordPress-Plugin-21759b?logo=wordpress)](https://wordpress.org)
[![License](https://img.shields.io/badge/License-GPL--2.0-red?logo=gnu)](LICENSE)

</div>
