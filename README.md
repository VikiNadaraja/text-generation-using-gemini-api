# text-generation-using-gemini-api
Text generation using Gemini API (REST)
Source link : https://ai.google.dev/gemini-api/docs/text-generation?lang=rest
curl "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=$GEMINI_API_KEY" \
    -H 'Content-Type: application/json' \
    -X POST \
    -d '{
      "contents": [{
        "parts":[{"text": "Write a story about a magic backpack."}]
        }]
       }' 2> /dev/null
