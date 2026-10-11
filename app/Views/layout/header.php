<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'POS System') ?></title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #edf2ff;
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, #4c1d95, transparent 32%),
                radial-gradient(circle at bottom right, #0e7490, transparent 30%),
                #111827;
        }

        nav {
            padding: 18px 8%;
            background: rgba(15, 23, 42, .78);
            border-bottom: 1px solid rgba(255,255,255,.12);
            backdrop-filter: blur(12px);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #ffffff;
            font-size: 22px;
            font-weight: bold;
            text-decoration: none;
            letter-spacing: .5px;
        }

        .logo span {
            color: #a78bfa;
        }

        nav a:not(.logo) {
            color: #cbd5e1;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }

        nav a:not(.logo):hover {
            color: #ffffff;
        }

        main {
            max-width: 1120px;
            margin: 42px auto;
            padding: 0 20px;
        }

        .card {
            background: rgba(30, 41, 59, .86);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 20px 45px rgba(0,0,0,.25);
            backdrop-filter: blur(12px);
        }

        h1 {
            margin: 0 0 10px;
            font-size: 30px;
            color: #ffffff;
        }

        p {
            color: #cbd5e1;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            padding: 11px 18px;
            border: 0;
            border-radius: 9px;
            background: linear-gradient(135deg, #8b5cf6, #6366f1);
            color: #ffffff;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(99,102,241,.28);
        }

        .button:hover {
            transform: translateY(-2px);
        }

        .secondary-button {
            background: #475569;
            box-shadow: none;
        }

        table {
            width: 100%;
            margin-top: 24px;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background: #312e81;
            color: #ffffff;
            text-align: left;
            padding: 14px;
        }

        td {
            padding: 14px;
            color: #e2e8f0;
            border-bottom: 1px solid rgba(255,255,255,.08);
        }

        tr:hover {
            background: rgba(139, 92, 246, .10);
        }

        .form-group {
            margin: 18px 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #e2e8f0;
        }

        input {
            width: 100%;
            padding: 12px;
            color: #ffffff;
            background: #0f172a;
            border: 1px solid #475569;
            border-radius: 9px;
            outline: none;
        }

        input:focus {
            border-color: #a78bfa;
            box-shadow: 0 0 0 3px rgba(167,139,250,.2);
        }

        .success-box {
            margin-bottom: 18px;
            padding: 14px;
            color: #bbf7d0;
            background: rgba(22, 163, 74, .18);
            border: 1px solid #22c55e;
            border-radius: 9px;
        }

        .error-box {
            margin-bottom: 18px;
            padding: 14px;
            color: #fecaca;
            background: rgba(220, 38, 38, .18);
            border: 1px solid #ef4444;
            border-radius: 9px;
        }

        .avatar {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #a78bfa;
        }

        .avatar-placeholder {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6, #06b6d4);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
        }

        footer {
            text-align: center;
            color: #94a3b8;
            padding: 20px;
        }
    </style>
</head>
<body>

<nav>
    <a class="logo" href="<?= base_url('/') ?>">
        Basic <span>POS</span>
    </a>

    <div>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('about') ?>">About</a>
        <a href="<?= base_url('customers') ?>">Customers</a>
        <a href="<?= base_url('users') ?>">Users</a>
    </div>
</nav>

<main>