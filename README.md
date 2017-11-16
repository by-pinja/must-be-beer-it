# Building versioned containers (for production and staging deployments)
1. Add git tag `git tag 1.0.0`
2. Push git tags `git push --tags`
3. This triggers build which generates container with specified git tag.
4. You can see excact container name/address from jenkins build.

# To get up and running
1. Create container: docker run --name torchrnn5 -ti crisbal/torch-rnn:base
2. Format data: sudo docker exec -it torchrnn5 python scripts/preprocess.py \
        --input_txt /var/temp/beer4.txt \
        --output_h5 beer.h5 \
        --output_json beer.json
      
3. Start learning: sudo docker exec -it torchrnn5 th sample.lua -checkpoint cv/checkpoint_9300.t7 -length 2000 -gpu -1
4. Get results: sudo docker exec -it torchrnn5 th train.lua -input_h5 beer.h5 -input_json beer.json -gpu -1