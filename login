#include<iostream>
using namespace std;

int main()
{
    int arr[5];
    int i, j, temp;

    cout << "enter 5 numbers";
    for (i = 0; i < 5; i++)
    {
        cin >> arr[i];
    }
    for (i = 0; i < 5; i++)
    {
        for (j = i + 1; j < 5; j++)
        {
            if (arr[j] < arr[i])
            {
                temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }
        cout << arr[i]<<",";
    }
    
}
