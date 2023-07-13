# PickMe

## Introduction
This document outlines the architecture and features of a web-based voting application built using blockchain technology and PHP on the CodeIgniter framework. The application aims to provide a secure and transparent voting system for various elections in campuses.

## Features
1. User Registration and Authentication:
   - Users can create accounts and authenticate themselves using their school email and a generated One-Time Password(OTP).
   - Authentication ensures that each user has a unique identity and can access the voting system securely.

2. Election Creation and Management:
   - Administrators can create and manage elections by defining the election parameters (e.g., start/end date, candidate list).
   - Each election is represented as a blockchain, ensuring immutability and transparency.

3. Candidate Registration:
   - Administrators register and approve the valid candidate nominations.

4. Secure Voting:
   - Users can cast their votes securely using the web application.
   - Each vote is recorded as a transaction on the blockchain, ensuring tamper-proof results.

5. Vote Counting and Results:
   - The system automatically tallies the votes and calculates the results.
   - Results are displayed in real-time, providing transparency and trust in the election process.

6. Ethereum Blockchain and Smart Contracts:
   - Utilizes the Ethereum blockchain to store and secure the election data.
   - Smart contracts, written in Solidity, are deployed on the Ethereum network to represent the election logic and data storage.

7. Integration with MetaMask and Ganache:
   - MetaMask, a browser extension, is integrated to interact with the Ethereum network and sign transactions securely.
   - Ganache, a local blockchain network, is used for testing and development purposes.

8. CodeIgniter Framework:
   - Built using the CodeIgniter framework, a lightweight PHP framework with MVC architecture.
   - CodeIgniter provides a structured approach to developing the application and ensures scalability and maintainability.

9. Security Measures:
   - Implements robust security measures such as encryption, secure user authentication, and protection against common vulnerabilities.

10. User Interface:
   - The application provides a user-friendly interface for easy navigation and interaction.
   - Responsive design for optimal user experience desktop devices.

## Technology Stack
- PHP 8.2.8 or [later] (https://www.php.net/supported-versions.php)
- CodeIgniter Framework
- Git
- `composer` command (See [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx))
- HTML/CSS/JavaScript (Front-end)
- MySQL (Database)
- Ethereum Blockchain (Smart Contracts, Solidity)
- MetaMask (Ethereum Wallet and Interaction)
- Ganache (Local Blockchain Network)

### Install CodeIgniter

```
$ composer create-project chari/codeigniter-composer-installer codeigniter
```

Above command installs `public/.htaccess` to remove `index.php` in your URL. If you don't need it, please remove it.

And it changes `application/config/config.php`:

~~~
$config['composer_autoload'] = FALSE;
↓
$config['composer_autoload'] = realpath(APPPATH . '../vendor/autoload.php');
~~~

~~~
$config['index_page'] = 'index.php';
↓
$config['index_page'] = '';
~~~

#### Install Translations for System Messages

If you want to install translations for system messages:

```
$ cd /path/to/codeigniter
$ php bin/install.php translations 3.1.0
```

#### Install Third Party Libraries

[Codeigniter Matches CLI](https://github.com/avenirer/codeigniter-matches-cli):

```
$ php bin/install.php matches-cli master
```

[CodeIgniter HMVC Modules](https://github.com/jenssegers/codeigniter-hmvc-modules):

```
$ php bin/install.php hmvc-modules master
```

[Modular Extensions - HMVC](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc):

```
$ php bin/install.php modular-extensions-hmvc codeigniter-3.x
```

[Ion Auth](https://github.com/benedmunds/CodeIgniter-Ion-Auth):

```
$ php bin/install.php ion-auth 2
```

[CodeIgniter3 Filename Checker](https://github.com/kenjis/codeigniter3-filename-checker):

```
$ php bin/install.php filename-checker master
```

[CodeIgniter Rest Server](https://github.com/chriskacerguis/codeigniter-restserver):

```
$ php bin/install.php restserver 2.7.2
```
[CodeIgniter Developer Toolbar](https://github.com/JCSama/CodeIgniter-develbar):

```
$ php bin/install.php codeigniter-develbar master
```

### Run PHP built-in server (PHP 5.4 or later)

```
$ cd /path/to/codeigniter
$ bin/server.sh
```

### Update CodeIgniter

```
$ cd /path/to/codeigniter
$ composer update
```

You must update files manually if files in `application` folder or `index.php` change. Check [CodeIgniter User Guide](http://www.codeigniter.com/user_guide/installation/upgrading.html).

## Ganache
Personal Ethereum Blockchain. (Local VM).

### Download & Install
Download: https://trufflesuite.com/ganache/

### Run Ganache
We can following these steps:
1. Open ganache, choose `Quickstart`. 
2. We can see 10 address account simulator for each 100 eth. 
3. If we click on :key: `Key Button` We can see Account Information about the `Account Address` and `Private Key`. 

### Ganache connect to Metamask

After we running the Ganache. We can connect the network to the metamask.

Following these steps:
1. Open the Metamask. And Click on dropdown Network. 
2. Choose `Add Network` and will redirect to these settings. 
3. Choose `Add a network manually` and will open these form network. 
4. Input the network settings for `Ganache`, you can follow these input. 
   1.  Network Name: `Ganache`
   2.  New RPC URL: `HTTP://127.0.0.1:7545`
   3.  Chain ID: `1337`
   4.  Currency Symbol: `ETH`
5. Save, and we can see the Network Ganache already added. 

### Import Ganache Account to Metamask
We want to import the Ganache Account to metamask, we can follow these steps:
1. Open the account section, and choose `Import Account`.
2. It will show the form import account.
3. Copy the `Private Key` on Ganache before, then copy it to the metamask private key form. 
4. After that, click `Import` button. We will see the `Account Address` and `Balance` are same like as in `Ganache Account`. We can adding multiple accounts from Ganache to Metamask.

### Send ETH between Account
After We have 2 imported account. We can simulate to send ETH between account.

Follow these steps:
1. In metamask, Click on `Send`. Then it will redirect to form send. 
2. Fill the inputs with the different account address. It will be like this. 
3. Then we set the `Amount`, and click send. For example 5 ETH. It will redirect to `Confirmation Page`. 
4. After we submit `Confirm`. We will redirect to `Transaction Queue Section`.  
5. After waiting for the pending, the transaction will be updated to History Section. 
6. Congratulations, we have successfully send the coin ! You can see also in Ganache Balance are updated. 

## Smart Contract Remix to Ganache

First, we need to create the smart contract.
```solidity
pragma solidity >=0.7.0 <0.9.0;

contract ProofOfExistence {
    mapping (bytes32 => bool) private proofs;

    function storeProof(bytes32 proof) public {
        proofs[proof] = true;
    }

    function proofFor(string memory document) private pure returns (bytes32) {
        return sha256(bytes(document));
    }

    function notarize(string memory document) public {
        storeProof(proofFor(document));
    }

    function checkDocument(string memory document) public view returns (bool) {
        return proofs[proofFor(document)];
    }
}
```

Step to deploy the contract:
1. Run the `Ganache` and choose `Quick Start`. Then we see the accounts 
2. Open Remix Browser, and select the localhost. 
3. In Remix, open tab Deploy then choose Environment `External HTTP Provider`. 
4. Update the url & port to follow the Ganache `RPC Server`. Which in this case is `http://127.0.0.1:7545` 
5. After connected, we've got the same account in `remix account` and `ganache account`. 
6. In Remix, we `Deploy` the smart contract to some account. And we can see the contract. 
7. In Ganache, we can see our contract in `Blocks` tab: And in the `Transactions` tab: 

After deployed, Step to transaction:
1. Create a transaction, Call `notarize` with input `"Hello"`:  We can see the transaction hash and the detail.
2. Then we can see in ganache transaction has been called, and the transaction hash is same like above. 
3. After that, we want to make sure that the transaction are legit. We can call the `checkDocument` with `"Hello"`: The response are valid true and the details are same like in Ganache transaction. 
**When only checking the transaction, there is no adding block / transaction**.

## Deployment
- The application can be deployed on a web server or cloud platform capable of running PHP applications.
- Database setup and configuration are required to store user data, candidate information, and election details.
- Integration with a blockchain network is necessary to implement the blockchain-based voting system.

## Conclusion
The web-based voting application built using blockchain technology and PHP on the CodeIgniter framework offers a secure, transparent, and efficient platform for conducting elections. With features like user authentication, candidate nomination, secure voting, and real-time results, the application ensures a trustworthy and tamper-proof election process.
