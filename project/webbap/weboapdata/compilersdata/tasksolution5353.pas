var n,c,d:string;
begin
read(N);
c:=copy(n,pos('.',n)+1,length(n)-pos('.',n));
d:=copy(n,1,pos('.',n)-1);
write(d,' ',c);
end.