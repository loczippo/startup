#include <stdio.h>

int main() {
	int Array[5] = {1,2,3,2,2};
	int x = 2;
	int count = 0;
	for(int i=0;i<sizeof(Array)/sizeof(int);i++) {
		if(Array[i] == x) {
			count++;
		}
	}
	printf("gia tri %d xuat hien %d lan", x, count);
	return 0;
}
