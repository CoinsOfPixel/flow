#flow

What is flow?

    Simple:

Flow is a payment system allowing users to sell their product/services and even crypto, get paid in any cryptocurrency listed on ChangeNOW (as long it's a pair with BTC) and receive the funds in fiat in the end of process.

    Workflow:

image

Once the merchant customer pay for the order, it's sent to the swap (changeNOW API) and you can get your API key here. Completed the conversion, funds then are sent to a brazilian exchange (yes, unfortunately at this moment it's only works for brazilian customers because we use PIX to make the transfers). In the brazilian exchange (we think the best solution until now is Bitcointrade due it's velocity to process the fiat witdraw request. Once in the bank account, using the bank API dedicated to PIX or the last part of script, user can decide if he want to use the PIX transfer API and send the funds from his bank account to another bank account, make payments, etc.

The system is being written and improved. That means it's not ready yet and is full of bug so please, use at your own risk. The UI will be the last thing I will give attention, first I will focus on script and make sure it's works with no mistake.

And an important thing I want to make clear:

Every new step means a new problem. More codes, more problems. For example, in the problem I'm facing now I could fix it recording the information on the db and then request it in the next page:

image

But nah, I don't like this idea because of the number of requests to db and I just don't want to go throught the easiest way. I will fix this soon or later. I had bigger problems before and I get rid of them, it's just one more.

I will also improve this readme doc but not now, 2 days direct working on the project and I'm very tired.

I also can't promise something huge, revolucionary... but I will do the possible to probvide at least an estructure of something cool and that I believe can save many time from brazilians merchants once they will not have to deal with crypto direct and once the payment fall inside the "flow", it's automatically, convert the user crypto to bitcoin then send to a brazilian exchange, request the withdraw, completed the withdraw, the bank API can start to to what they was written to do (payments and transfers). Or not.
