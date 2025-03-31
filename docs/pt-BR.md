<p align="center">
  <a href="https://www.meanify.co?from=github&lib=laravel-payment-hub">
    <img src="https://meanify.co/assets/core/img/logo/png/meanify_color_dark_horizontal_02.png" width="200" alt="Meanify Logo" />
  </a>
</p>


# 📦 Meanify Package Functions

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue)
![Laravel](https://img.shields.io/badge/Laravel-10%2B-orange)
![Status](https://img.shields.io/badge/status-em%20desenvolvimento-yellow)

Este pacote fornece uma função global `meanify()` que atua como um **dispatcher centralizado** para acessar outras funções globais definidas por packages `meanify-*`, com suporte a **autocomplete**, **validação de dependências** e **organização limpa**.

---

## 🚀 Instalação

Adicione o repositório local no seu `composer.json` (caso ainda não esteja publicado):

```json
"repositories": [
    {
        "type": "path",
        "url": "../meanify-packages/meanify-package-functions",
        "options": {
            "symlink": true
        }
    }
]
```

Instale o pacote:

```bash
composer require meanify-co/meanify-package-functions
```

---

## 🧠 Como funciona

Após instalar o pacote, você pode usar a função global `meanify()` para acessar métodos utilitários registrados por outros pacotes Meanify, de forma padronizada e com suporte a IDE/autocomplete:

```php
meanify()->helpers();
meanify()->paymentHub(...);
```

Os métodos públicos declarados na classe `MeanifyDispatcher` fazem chamadas internas para funções como `meanifyHelpers()`, `meanifyPaymentHub()` etc., se estiverem disponíveis.

---

## ✅ Vantagens

- ✅ Autocomplete com parâmetros na IDE
- ✅ Validação automática se o package está instalado
- ✅ Organização centralizada e extensível
- ✅ Evita colisões com funções globais
- ✅ Ideal para ecossistemas modulares

---

## 🧩 Exemplo: Método `paymentHub()`

No dispatcher:

```php
public function paymentHub(string $token, array $options = [])
{
    if (!\Composer\InstalledVersions::isInstalled('meanify-co/laravel-payment-hub')) {
        throw new \RuntimeException(
            "O pacote 'meanify-co/laravel-payment-hub' não está instalado. Instale para usar meanify()->paymentHub()."
        );
    }

    return $this->__call('paymentHub', [$token, $options]);
}
```

---

## 📐 Como adicionar novos métodos

1. Crie sua função global em outro pacote:

```php
function meanifyLogger(string $message, string $level = 'info') {
    // ...
}
```

2. No dispatcher, adicione:

```php
public function logger(string $message, string $level = 'info')
{
    return $this->__call('logger', [$message, $level]);
}
```

---

## 📝 Requisitos

- PHP 8.0 ou superior
- Composer 2.x com suporte a `composer-runtime-api`
- Laravel 10 ou superior (recomendado)

---

## 🧪 Teste rápido

```php
dump(meanify()->helpers());
```

---

## 📚 Licença

MIT © Meanify Tecnologia LTDA