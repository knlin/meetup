males = [
    ['Male1', 'male', 'N', 'B', 'R'],
    ['Male2', 'male', 'J', 'V', 'C'],
    ['Male3', 'male', 'G', 'E', 'B'],
    ['Male4', 'male', 'J', 'D', 'I'],
    ['Male5', 'male', 'T', 'Y', 'Q']
    ]
females = [
    ['Female1', 'female', 'A', 'Q', 'B'],
    ['Female2', 'female', 'C', 'D', 'G'],
    ['Female3', 'female', 'A', 'M', 'Z'],
    ['Female4', 'female', 'P', 'R', 'W'],
    ['Female5', 'female', 'B', 'Q', 'G']
]

ordered_matches = []

for male in males:
    for female in females:
        match = 0
        for i in xrange(3):
            for j in xrange(3):
                if male[i+2] == female[j+2]:
                    match += i + j
        if match < 5:
            for j in xrange(3):
                for k in xrange(3):
                    if male[j+2] == female[k+2]:
                        ordered_matches.append((male[0], female[0], male[j+2], female[k+2], match))

print sorted(ordered_matches, key=lambda x: x[4])