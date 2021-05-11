#include <stdio.h>

int main() {
	int Array[10] = {1, 2, 3, 2, 4, 5, 4, 4};
	int dem;
    for(int i = 0;i<sizeof(Array)/sizeof(int)-1;i++) {
    	dem=0;
    	for(int j = 0 ;j<sizeof(Array)/sizeof(int);j++) {
    		if(Array[i] == Array[j] && i!=j) dem++;
		}
		if(dem==0) {
			printf("%d ", Array[i]);
		}
	}
	return 0;
}
