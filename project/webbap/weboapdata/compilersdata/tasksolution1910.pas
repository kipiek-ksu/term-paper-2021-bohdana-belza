Program zad9_2;
Var
  A : array[1..255] of char;
  k, l, r, i, j,z,n : Integer;
  b:char;
  S,P : integer;

Begin
     readln(n);
     for z:=1 to n do
         read(a[z]);
     For k:=1 to n-1 do
         begin
              b:=A[k+1];
              If b<A[k] then
                 begin
                      l:=1;
                      r:=k;
                      Repeat
                            j:=(l+r) div 2;
                            If b<A[j] then
                               begin
                                    r:=j;
                                    s:=s+1;
                               end
                               else
                                   begin
                                        l:=j+1;
                                        s:=s+1;
                                   end
                      Until (l = j);
                      For i:=k downto j do
                          A[i+1]:=A[i];
                      A[j]:=b;
                      p:=p+1;
                      for z:=1 to n do
                          if z=n then write(a[z])
                             else write(a[z],' ');
                      writeln;
                 end;
         end;
     writeln(S,' ',P,' ');
     for z:=1 to n do
         if z=n then write(a[z])
            else write(a[z],' ');
End.