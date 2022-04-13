program l9_1;
var a:array[1..100]of char; b:char;
    i,j,k,l,r,s,p,n:word;
Begin
     readln(n);
     for i:=1 to n do
     read(a[i]);

     for k:=n-1 downto 1 do
     begin
         b:=a[k]; s:=s+1;
         if ord(b) < ord(a[k+1]) then
         begin
              l:=k;
              r:=n;
              repeat
                    j:=(l+r) div 2;  s:=s+2;
                    if ord(b) > ord(a[j]) then r:=j
                                          else l:=j+1;
              until r=j; p:=p+j-k;
              for i:=k to j do a[i]:=a[i+1];
              a[j]:=b;
              s:=s+1;
              if k<=j then
              begin
                   for i:=1 to n do
                   write(a[i]);
                   writeln;
              end;
         end;

     end;

     writeln(s);
     writeln(p);
     for i:=1 to n do
     write(a[i]);
End.