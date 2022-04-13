program l9_1;
var a:array[1..100]of char;
    b:char;
    i,j,k,l,r,s,p,n:word;
Begin
     clrscr;
     readln(n);
     for i:=1 to n do
     read(a[i]);

     for k:=1 to n-1 do
     begin
         b:=a[k+1];
         s:=s+1;
         if ord(b) > ord(a[k]) then
         begin
              l:=1;
              r:=k;
              repeat
                    j:=(l+r) div 2;
                    s:=s+2;
                    if ord(b) > ord(a[j]) then r:=j
                                          else l:=j+1;
              until l=j;
              for i:=k downto j do begin a[i+1]:=a[i]; p:=p+1; end;
              a[j]:=b;

              for i:=1 to n do
              write(a[i],' ');
              writeln;
              end;
     end;
     writeln(s-2);
     writeln(p);
     for i:=1 to n do
     write(a[i],' ');
End.