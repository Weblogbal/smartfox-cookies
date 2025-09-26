# Instructions de déploiement - Smartfox Cookies

## Prérequis pour GitHub

1. **Repository public** : Assurez-vous que le repository `smartfox-cookies` est public sur GitHub
2. **Structure** : Le repository doit contenir tous les fichiers à la racine

## Étapes pour publier une nouvelle version

### 1. Préparation
```bash
# Mettre à jour le code local
git pull origin main
```

### 2. Mise à jour des versions
Modifiez les fichiers suivants avec le nouveau numéro de version :

**a) `smartfox-cookies.php`**
```php
Version: 1.0.3  // Ligne 5
```

**b) `version.json`**
```json
{
  "version": "1.0.3",
  "last_updated": "2025-09-26",
  "changelog": {
    "1.0.3": {
      "date": "2025-09-26",
      "changes": [
        "Description des modifications..."
      ]
    }
  }
}
```

**c) `CHANGELOG.md`**
```markdown
## [1.0.3] - 2025-09-26
### Ajouté
- Nouvelle fonctionnalité...
### Modifié  
- Amélioration...
### Corrigé
- Bug corrigé...
```

### 3. Test en local
```bash
# Vérifier que tous les fichiers sont correctement formatés
# Tester l'extension dans un environnement WordPress local
```

### 4. Commit et push
```bash
git add .
git commit -m "Version 1.0.3 - Description des modifications"
git push origin main
```

### 5. Vérification
1. **GitHub** : Vérifiez que `version.json` est accessible via l'URL brute :
   ```
   https://raw.githubusercontent.com/Weblogbal/smartfox-cookies/main/version.json
   ```

2. **WordPress** : Les utilisateurs recevront automatiquement la notification de mise à jour dans les 12 heures. Pour tester immédiatement, vous pouvez :
   - Désactiver puis réactiver l'extension
   - Ou utiliser le mode debug : ajoutez `?smartfox_debug=1` à l'URL d'admin pour forcer une vérification

## URLs importantes

- **Repository** : https://github.com/Weblogbal/smartfox-cookies
- **Version JSON** : https://raw.githubusercontent.com/Weblogbal/smartfox-cookies/main/version.json
- **Download ZIP** : https://github.com/Weblogbal/smartfox-cookies/archive/refs/heads/main.zip
- **Changelog** : https://github.com/Weblogbal/smartfox-cookies/blob/main/CHANGELOG.md

## Dépannage

### Mode Debug (pour les développeurs)

Pour diagnostiquer les problèmes de mise à jour, utilisez le mode debug :
```
votre-site.com/wp-admin/plugins.php?smartfox_debug=1
```

Ceci affichera :
- Version actuelle du plugin
- Slug du plugin
- URLs GitHub utilisées
- Données récupérées depuis `version.json`
- Erreurs éventuelles de connexion

### Les utilisateurs ne reçoivent pas les mises à jour

1. Vérifiez que le `version.json` est accessible publiquement
2. Vérifiez le format JSON (pas d'erreurs de syntaxe)
3. Videz le cache WordPress si nécessaire
4. Vérifiez les logs d'erreur PHP

### Erreurs de téléchargement

1. Assurez-vous que le repository est public
2. Vérifiez l'URL de téléchargement dans `version.json`
3. Testez le téléchargement manuel du ZIP

### Problèmes de cache

Les utilisateurs peuvent forcer une vérification de plusieurs façons :
- **Désactiver/Réactiver** l'extension depuis la page des plugins
- **Mode debug** : Ajouter `?smartfox_debug=1` à l'URL d'admin pour voir les informations de debug et forcer une vérification
- **Cache WordPress** : Vider les transients via un plugin de cache ou en ajoutant temporairement ce code dans `functions.php` :
  ```php
  delete_site_transient('update_plugins');
  ```

## Checklist de publication

- [ ] Numéro de version mis à jour dans `smartfox-cookies.php`
- [ ] `version.json` mis à jour avec la nouvelle version
- [ ] `CHANGELOG.md` mis à jour avec les modifications
- [ ] Tests effectués en local
- [ ] Commit et push vers GitHub
- [ ] Vérification de l'URL `version.json` accessible
- [ ] Test de la notification de mise à jour WordPress