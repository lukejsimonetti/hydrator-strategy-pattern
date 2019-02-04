# hydrator-strategy-pattern

This repo is a partial app, solely for deomonstrating a Hydrator-Strategy pattern in PHP. 
The goal is to write a hydration pattern that allowed for hydrating deeply nested response objects from an API - all while maintainig an OO approach.

It wraps a fake form API that will generate a response that looks like this: 

```
{
      "title":{
        "plain":"Send Money"
      },
      "fieldset":[
        {
          "label":{
            "plain":"Personal Info Section"
          },
          "fieldset":[
            {
              "field":[
                {
                  "label":{
                    "plain":"First Name"
                  },
                  "value":{
                    "plain":"Bob"
                  },
                  "id":"a_1"
                },
                {
                  "label":{
                    "plain":"Last Name"
                  },
                  "value":{
                    "plain":"Hogan"
                  },
                  "id":"a_2"
                }
              ],
              "id":"a_8"
            }
          ],
          "id":"a_5"
        },
        {
          "label":{
            "plain":"Billing Details Section"
          },
          "fieldset":{
            "field":{
              "choices":{
                "choice":{
                  "label":{
                    "plain":"Gift"
                  },
                  "id":"a_17",
                  "switch":""
                }
              },
              "label":{
                "plain":"Choose a category:"
              },
              "value":{
                "plain":"Gift"
              },
              "id":"a_14"
            },
            "fieldset":{
              "label":{
                "plain":""
              },
              "field":[
                {
                  "choices":{
                    "choice":{
                      "label":{
                        "plain":"Other"
                      },
                      "id":"a_25",
                      "switch":""
                    }
                  },
                  "label":{
                    "plain":"Amount"
                  },
                  "value":{
                    "plain":"Other" //(This could also be a dollar amount like 10.00)
                  },
                  "id":"a_21"
                },
                {
                  "label":{
                    "plain":"Other Amount"
                  },
                  "value":{
                    "plain":"200"
                  },
                  "id":"a_20"
                }
              ],
              "id":"a_26"
            },
            "id":"a_13"
          },
          "id":"a_12"
        }
      ]
    }
    ```
    The end result is a hydrated PHP object filled with nested child objects.
