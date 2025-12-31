# Base58 Fiat Gateway (SEPA/SWIFT)

> **🔒 RESTRICTED ACCESS**
> This repository handles direct bank transfers. Access is limited to the `billing-ops` team.

## Overview
The `fiat-sepa-gateway` acts as a middleware between Base58's crypto ledger and traditional European banking APIs (EBICS/PSD2).

## Key Modules
* **IBAN Validation**: Strict checksum verification for Eurozone accounts.
* **AML Checks**: Anti-Money Laundering screening via external providers.
* **Reconciliation**: Automated nightly batch processing for transaction matching.

## Security Warning
* Direct database access is blocked.
* Use the signed API endpoints for all transaction inquiries.
* All logs are sanitized to remove PII (Personally Identifiable Information).

---
*Property of Base58 Labs. Unauthorized distribution is prohibited.*
