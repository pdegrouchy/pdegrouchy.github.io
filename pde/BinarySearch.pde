
int[] list = new int[20];
boolean isKeySet = false;
int keyInUse;
boolean done = false;
int coloredBarIndex = -1;

int low = 0;
int high = list.length - 1;
int mid = int((low + high) / 2);

// Setup the Processing Canvas
void setup() {
  size(600, 400);
  strokeWeight(2);
  noLoop();

  for (int i = 0; i < list.length; i++) {
    list[i] = i + 1;
  }

  reset();
}

int getMax(int[] list) {
  // Find maximum integer
  int max = list[0];
  for (int i = 1; i < list.length; i++) {
    if (max < list[i]) {
      max = list[i];
    }
  }
  return max;
}

void draw() {
  double h = height * 0.88;
  double w = width - 60;
  double unitWidth = w * 1.0 / list.length;
  int max = getMax(list);

  for (int i = 0; i < list.length; i++) {
    fill(new color("white")); // Color dim gray
    rect(i * unitWidth + 30, height
      - ((list[i] + 1) / max) * h, unitWidth, ((list[i] + 1) / max) * h - 20);
    fill(0, 102, 153);
    text(list[i], i * unitWidth + 30 + 10,
      height - ((list[i] + 1) / max) * h - 7);
    text(i, i * unitWidth + 30 + 10, height - 5);
  }

  text("index", 1, height - 5);

  for (int i = low; i <= high; i++) {
    fill(#C0C0C0); // Color dim gray
    rect(i * unitWidth + 30, height
      - ((list[i] + 1) / max) * h, unitWidth, ((list[i] + 1) / max) * h - 20);
  }

  fill(#FF0000); // Color red
  if (isKeySet) {
    text("Search for key " + keyInUse, 10, 10);
    rect(mid * unitWidth + 30, height
      - (list[mid] + 1) / max * h, unitWidth, ((list[mid] + 1) / max) * h - 20);
  }
}

int getKey() {
  return keyInUse;
}

void reset() {
  isKeySet = false;
  coloredBarIndex = -1;
  done = false;

  low = 0;
  high = list.length - 1;
  mid = int((low + high) / 2);

  // Fill canvas grey
  background(new color("white"));
}

int step(int key) {
  if (!isKeySet) {
    isKeySet = true;
    keyInUse = key; // Set key in the first step
  }

  if (done) return 1;

  if (low > high)
    return -2;

  mid = int((low + high) / 2);
  draw();
  if (keyInUse == list[mid]) {
    done = true;
    return mid;
  }
  else if (keyInUse > list[mid]) {
    low = mid + 1; // Continue to search the second half
    return -1;
  }
  else { // keyInUse < list[mid]
    high = mid - 1; // Continue to search the first half
    return -1;
  }
}
