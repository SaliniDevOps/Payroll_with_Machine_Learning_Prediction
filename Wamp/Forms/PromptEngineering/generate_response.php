<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input data from the request
    $input = json_decode(file_get_contents('php://input'), true);

    // Check if the question is provided
    if (isset($input['question'])) {
        $question = htmlspecialchars($input['question']);

        // Replace 'your-api-key-here' with your actual OpenAI API key
        $apiKey = 'sk-proj-YznUe7NKvacr8powa3muT3BlbkFJA1agYbIGVDaLNWc8ioHe';
        $prompt = "Answer the following question about company labor regulations: $question";

        $data = [
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'max_tokens' => 150
        ];

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-type: application/json\r\n" .
                             "Authorization: Bearer $apiKey\r\n",
                'content' => json_encode($data)
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents('https://api.openai.com/v1/completions', false, $context);
        $response = json_decode($result, true);

        if (isset($response['choices'][0]['text'])) {
            echo $response['choices'][0]['text'];
        } else {
            echo 'Error generating response.';
        }
    } else {
        echo 'Question not provided.';
    }
} else {
    echo 'Invalid request method.';
}
