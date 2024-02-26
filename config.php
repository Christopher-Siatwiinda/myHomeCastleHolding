<?php
   require 'vendor/autoload.php';
// MongoDB connection parameters
    $mongodb_uri = "mongodb+srv://christopher:(chris000)@cluster0.regxgrq.mongodb.net/";

    try {
        // Connect to MongoDB
        $mongoClient = new MongoDB\Client($mongodb_uri);

        // Select database and collection
        $db = $mongoClient->selectDatabase('ussd');
        $collection = $db->your_collection_name;

        // Define your session ID
        $mySession = "Test session";

        // Query MongoDB collection 
        $session = $collection->findOne(['sessionId' => $mySession]);

        if ($session) {
            // Update existing document
            $result = $collection->updateOne(
                ['_id' => $session['_id']],
                ['$set' => ['text' => 'Record Updated']]
            );
        } else {
            // Insert new document
            $result = $collection->insertOne([
                'sessionId' => $mySession,
                'msisdn' => 260970000000,
                'text' => 'test db connection'
            ]);
        }

        // Check if operation was successful
        if ($result->getInsertedCount() > 0 || $result->getModifiedCount() > 0) {
            echo "ok";
        } else {
            echo "fail";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>
