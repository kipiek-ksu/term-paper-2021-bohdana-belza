Program 4;
      Var A : array[1..100] of Integer;
            k : Integer;    l,n, r, i, j : Integer;    b : Integer;
   Begin
    read(n);
    for i:=1 to n do
      read(a[i]);
     For k := 1 to n-1 do begin
      b := A[k+1];
      If b > A[k]
       then begin
         l := 1; r := k;
        Repeat
           j := (l + r) div 2;
          If b > A[j]  then r := j  else  l := j + 1;
         until (l = j);
         For i := k downto j do A[i+1] := A[i];
          A[j] := b ;
       end
     end;
     for i:=1 to n do
       write(a[i],' ')
   End.
